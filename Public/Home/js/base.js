 
	$('.language span').click( function () {
		$(this).addClass('on').siblings().removeClass('on');
	});

	$('.btn').click( function () {
		$('.search').show();
	});
        $('.en').hide();
        $('#en').click(function(){
        $('.cn').hide();
        $('.en').show();
        });
        $('#zn').click(function(){
            $('.cn').show();
            $('.en').hide();
        });
              
