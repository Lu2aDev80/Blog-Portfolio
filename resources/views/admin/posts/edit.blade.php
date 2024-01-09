<form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input name="title" :value="old('title', $post->title)" required/>
    <input name="slug" :value="old('slug', $post->slug)" required/>

    <div class="flex mt-6">
        <div class="flex-1">
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
        </div>

        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
    </div>

    <textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</textarea>
    <textarea name="body" required>{{ old('body', $post->body) }}</textarea>

    <label name="category"/>

        <select name="category_id" id="category_id" required>
            @foreach (\App\Models\Category::all() as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                >{{ ucwords($category->name) }}</option>
            @endforeach
        </select>

    <error name="category"/>

    <button>Update</button>
</form>



<?php
/*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Dateityp kontrollieren
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tpm_name"]);
    if ($check !== false) {
        echo "Datei ist ein Bild - " . $check["mine"] . ".";
        $uploadOk = 1;
    } else {
        echo "Datei ist kein Bild!";
        $uploadOk = 0;
    }
}

// überprüfen ob bereits vorhanden
if (file_exists($target_file)) {
    echo "Dieses Bild existiert bereits!";
    $uploadOk = 0;
}

// Dateigröße überprüfen
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Datei zu groß!";
    $uploadOk = 0;
}

// unterschiedliche dateitypen erlauben
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Bitte nur JPG, JPEG, PNG & GIF verwenden.";
    $uploadOk = 0;
}

// $uploadeOk überprüfen
if ($uploadOk == 0) {
    echo "Entschuldigung, aber dein Bild konnte nicht hochgeladen werden.";
} else {
    //wenn alles ok hochladen
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Das Bild wurde erfolgreich hochgeladen!";
    } else {
        echo "error, das Bild konnte nicht hochgladen werden.";
    }
}*/
