<?php
include './navbar.php';
$query = "select * from category";
$category = getAll($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog : Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/editor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    .btn {
        padding: 10px 20px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.7);
        color: #000;
        text-decoration: none;
        text-transform: capitalize;
        border: 1px solid #000;
    }

    .btn.dark {
        background: #1b1b1b;
        color: #fff;
    }

    form {
        height: 4000px;
    }

    .banner {
        width: 100%;
        height: 1500px;
    }

    .banner img {
        width: 100%;
        height: 1500px;
    }
    </style>
</head>

<body>
    <form action="./controller/save-add-post.php" method="post" enctype="multipart/form-data">
        <div class="banner">
            <img id="img" src="" alt="Preview">
            <input type="file" name="thumbnail" id="banner-upload" hidden>
            <label for="banner-upload" class="banner-upload-btn"><i class='bx bx-upload'></i></label>
        </div>
        <div class="blog">
            <textarea type="text" name="title" class="title" placeholder="Blog title..."></textarea>
            <textarea style="font-size: 40px;" type="text" name="sub-title" class="title"
                placeholder="Blog sub title..."></textarea>
            <select style="font-size: 25px; margin-bottom: 50px;" name="post-category" id="">
                <?php foreach ($category as $value) : ?>
                <option value="<?php echo $value["id"] ?>"><?php echo $value["categoryName"] ?></option>
                <?php endforeach ?>
            </select>
            <!-- <textarea id="myTextarea" name="content" type="iframe" class="article"
                placeholder="Start writing here..."></textarea> -->
            <textarea style="width: 100%; height: 1000px;" name="editor_input" id="myTextarea"></textarea>
        </div>
        </div>

        <div class="blog-options">
            <button type="submit" name="add-post" class="btn dark publish-btn" onclick="submitData();">publish</button>
        </div>
    </form>
    <script type="text/javascript">
    const fileImg = document.getElementById("banner-upload");
    fileImg.onchange = evt => {
        const [file] = fileImg.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }
    }
    </script>
</body>
<script src="tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#myTextarea',
    placeholder: 'Start writing here...',
    height: 1000,
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
            title: 'My page 1',
            value: 'https://www.codexworld.com'
        },
        {
            title: 'My page 2',
            value: 'http://www.codexqa.com'
        }
    ],
    image_list: [{
            title: 'My page 1',
            value: 'https://www.codexworld.com'
        },
        {
            title: 'My page 2',
            value: 'http://www.codexqa.com'
        }
    ],
    image_class_list: [{
            title: 'None',
            value: ''
        },
        {
            title: 'Some class',
            value: 'class-name'
        }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
                text: 'My text'
            });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', {
                alt: 'My alt text'
            });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', {
                source2: 'alt.ogg',
                poster: 'https://www.google.com/logos/google.jpg'
            });
        }
    },
    templates: [{
            title: 'New Table',
            description: 'creates a new table',
            content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
        },
        {
            title: 'Starting my story',
            description: 'A cure for writers block',
            content: 'Once upon a time...'
        },
        {
            title: 'New list with dates',
            description: 'New List with dates',
            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
        }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 400,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
</script>


</html>