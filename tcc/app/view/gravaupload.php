<pre>
<?php
$nomearq = date('dmYhis').$_FILES['icone']['name'];
move_uploaded_file($_FILES['icone']['tmp_name'], '../../assets/images/'.$nomearq);
