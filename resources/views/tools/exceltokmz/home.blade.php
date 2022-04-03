<form method="post" enctype="multipart/form-data" action="{{ route('tool.excel_to_kmz.import') }}">
    @csrf
    <input type="file" name="import_file">
    <input type="submit" name="upload" value="Upload">
</form>