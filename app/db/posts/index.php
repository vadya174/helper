<?php

use App\models\PostData;

use App\db\components\QueryHelper;

$postData=new PostData(new QueryHelper());
$postData->getAllPosts();