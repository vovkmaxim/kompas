<div class="view">
<?php
$this->widget('zii.widgets.CListView', array(
    'model'=>$model,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>	
</div>
