<!DOCTYPE html>
<html>
	{!! html::head() !!}
	<body{!! html::getBodyAttributes() !!}>
		@if (isset($content))
			{!! $content !!}
		@endif
		{!! html::getjs() !!}
	</body>
</html>
