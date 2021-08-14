<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 4</title>
    <script src="https://cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <textarea name="content" id="editor">
        <!-- &lt;p&gt;This is some sample content.&lt;/p&gt; -->
    </textarea>
    <script>




        
        CKEDITOR.replace( 'content' ,{
            removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,image'
        });




    </script>
</body>
</html>