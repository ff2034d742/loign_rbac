<?php
use yii\helpers\Html;
use common\models\ValueHelpers;
/**
* @var yii\web\View $this
*/
$this->title = 'Admin Yii 2 Build';
$is_admin = ValueHelpers::getRoleValue('Admin');
?>
<div class="site-index">
<div class="jumbotron">
<h1>Welcome to Admin!</h1>
<p class="lead">
Now you can manage users, roles, and more with
our easy tools.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&&
Yii::$app->user->identity->role_id >=
$is_admin) {
echo Html::a('Manage Users', ['user/index'],
['class' => 'btn btn-lg btn-success']);
}
?>
</p>
</div>
<div class="body-content">
<div class="row">
<div class="col-lg-4">
<h2>Users</h2>
<p>
Este es el lugar para administrar usuarios. Puede editar el estado y los roles desde aquí.
La interfaz de usuario es fácil de usar e intuitiva, simplemente haga clic en el enlace a continuación para comenzar.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Users', ['user/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
<div class="col-lg-4">
<h2>Roles</h2>
<p>
Aquí es donde gestionas los roles. Puedes decidir quién es administrador y w \
ho no es Usted puede
agregue un nuevo rol si lo desea, simplemente haga clic en el enlace a continuación para comenzar.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Roles', ['role/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
<div class="col-lg-4">
<h2>Profiles</h2>
<p>
¿Necesita revisar los perfiles? Este es el lugar para hacerlo.
Estos son fáciles de administrar a través de la interfaz de usuario. Simplemente haga clic en el enlace a continuación para administrar los perfiles.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Profiles', ['profile/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<h2>User Types</h2>
<p>
Este es el lugar para administrar los tipos de usuarios. Puedes editar usuario
tipos de aquí. La interfaz de usuario es fácil de usar e intuitiva, solo
Haga clic en el enlace de abajo para empezar.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage User Types', ['user-type/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
<div class="col-lg-4">
<h2>Statuses</h2>
<p>
Aquí es donde administra los estados. Puedes agregar o eliminar.
Puede agregar un nuevo estado si lo desea, simplemente haga clic en el enlace
a continuación, para comenzar.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Statuses', ['status/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
<div class="col-lg-4">
<h2>Placeholder</h2>
<p>
¿Necesita revisar los perfiles? Este es el lugar para hacerlo.
Estos son fáciles de administrar a través de la interfaz de usuario. Simplemente haz clic en el siguiente enlace
para gestionar perfiles.
</p>
<p>
<?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Profiles', ['profile/index'],
['class' => 'btn btn-default']);
}
?>
</p>
</div>
</div>
</div>
</div>
