document.getElementById('file-upload').addEventListener('change', function(event) {
    let fileCount = event.target.files.length;
    let fileNameDisplay = document.getElementById('file-name');
    
    if (fileCount > 0) {
        fileNameDisplay.textContent = fileCount + " {{ __('ui.Files_Selected') }}";
    } else {
        fileNameDisplay.textContent = "{{ __('ui.No_File_Selected') }}";
    }
});
document.addEventListener("livewire:load", () => {
    Livewire.hook('message.processed', (message, component) => {
        let inputFile = document.getElementById('file-upload');
        let fileNameDisplay = document.getElementById('file-name');

        if (inputFile.files.length > 0) {
            fileNameDisplay.textContent = inputFile.files.length + " {{ __('ui.Files_Selected') }}";
        } else {
            fileNameDisplay.textContent = "{{ __('ui.No_File_Selected') }}";
        }
    });
});