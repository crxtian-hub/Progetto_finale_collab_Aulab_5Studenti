<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    use WithFileUploads;
    
    public $article;
    public $images = []; 
    public $temporary_images = []; 
    public $old_images = [];
    public $title;
    public $description;
    public $price;
    public $category;
    public $fileCount = 0;

    
    public function mount()
    {
        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->old_images = $this->article->images;
        $this->price = $this->article->price;
        $this->category = $this->article->category;
    }


    public function updatedTemporaryImages()
    {
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
        $this->fileCount = count($this->temporary_images);

    }

    public function removeImage($key)
    {
        unset($this->images[$key]);
        unset($this->temporary_images[$key]);
        $this->images = array_values($this->images);
        $this->temporary_images = array_values($this->temporary_images);
    }

    public function articleUpdate()
    {
        $this->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category' => 'required',
            'temporary_images.*' => 'image|max:1024', 
            'temporary_images' => 'max:6', 
        ]);
    

        if (!empty($this->temporary_images)) {
            if ($this->old_images) {
                foreach ($this->old_images as $image) {
                    Storage::delete($image->path);
                    $image->delete();
                }
            }
    
            $savedImages = []; 
    
            foreach ($this->temporary_images as $image) {
                $newFileName = "articles/{$this->article->id}";  
                $path = $image->store($newFileName, 'public');
    
                $newImage = $this->article->images()->create(['path' => $path]);
                $savedImages[] = $newImage->id; 
            }
    

            foreach ($savedImages as $imageId) {
                RemoveFaces::withChain([
                    new ResizeImage($this->article->images()->find($imageId)->path, 300, 300),
                    new GoogleVisionSafeSearch($imageId),
                    new GoogleVisionLabelImage($imageId)
                ])->dispatch($imageId);
            }
    

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
    

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
        ]);
    
        $this->article->setAccepted(null);
    
        return redirect('/')->with('success', __('ui.Article Edited Successfully'));
    }
    

    
    public function render()
    {
        return view('livewire.article-edit');
    }

    public function destroy()
            {
                $this->article->delete();
                session()->flash('messaged', __('ui.Delete Articles'));
                return redirect()->route('article.index');
            }
}
