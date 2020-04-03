<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/**
* @var yii\web\View $this
* @var app\models\Profile $model
* @var yii\widgets\ActiveForm $form
*/
?>
<div class="profile-form">
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
<br/>
<?php echo $form->field($model, 'birhtdate')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'value' => '01/29/2014',
    'pluginOptions' => [
    'autoclose'=>true,
    'format' => 'yyyy/mm/dd'
    ]
]); ?>
<br/>
<?= $form->field($model, 'gender_id')->dropDownList($model->genderList,
['prompt' => 'Please Choose One' ]);?>
<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
