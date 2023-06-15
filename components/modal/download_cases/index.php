<div class="form-popup" id="download">
    <form class="form-container-download">
        <h1>Choose type of document</h1>
        <label for="format">Choose a format:</label>
        <select class="form-control" name="format" id="format">
            <option value="pdf">PDF</option>
            <option value="excel">Excel</option>
            <option value="word">Word</option>
        </select>
        <button class="btn btn-success">Download</button>
        <div class="btn btn-danger" onclick="closeForm('download')">
            <p>Back</p>
        </div>
    </form>
</div>