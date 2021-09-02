<h1><?php echo e($details['title']); ?></h1>
<h4 class="text-success">
	Hallo, <strong><?php echo e($details['sponsor'][0]->username); ?></strong>
</h4>
<blockquote class="blockquote-footer text-info">
	Anda mempunyai member join baru yang perlu di aktivasi, <br> <strong><b><i><?php echo e($details['username']); ?></i></b></strong> telah join menjadi member anda, anda bisa aktivasi member baru di link di bawah ini : 
</blockquote>

<br><br><br>
<p>
	Aktivasi member baru anda di sini <br> 

	<br>
	<a href="https://evoush.com/auth/login" class="btn btn-info btn-block">Aktivasi Member</a>
</p><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/dashboard/emails/SendActivationEmail.blade.php ENDPATH**/ ?>