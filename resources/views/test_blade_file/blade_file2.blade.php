<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@component('test_blade_file.alert',['pass_data'=>'Additional Data'])
   		This is the alert message here from alert file.
   		
   		@slot('slotvar')
   			This is Slotvar1...!!!
   		@endslot
   		
   		@slot('slotvar2')
   			This is Slotvar2...!!!
   		@endslot

	@endcomponent
</body>
</html>
