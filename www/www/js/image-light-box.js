$(document).ready(function() {
	var imgsrc = "";
	var altertext = "";
	var openedImages = "";
	$(".gallery-overlay").on('click',function() {
		openedImages = $(this);
		imgsrc = $(this).parent().find("img").attr("src");
		
		var name = $(this).parent().find("img").attr("src");
	    var parts = name.split('/');
	    name = parts[parts.length-1];
	    
	    imgsrc = imgsrc.replace(name, name);

		altertext = $(this).parent().find("img").attr("alt");
		if ($(openedImages).parent().is(':last-child')) {
			$(".next_image_btn").hide();
		} else {
			$(".next_image_btn").show();
		}
		if ($(openedImages).parent().is(':first-child')) {
			$(".previous_image_btn").hide();
		} else {
			$(".previous_image_btn").show();
		}

	});
	$('#image_lightbox').on('show.bs.modal', function(e) {
		$("#image_lightbox").find("img").attr("src", imgsrc);
		$("#image_lightbox_label").html(altertext);
	});
	$(".next_image_btn").on('click',function() {
		openedImages = $(openedImages).parent().next();
		$(".previous_image_btn").show();
		if ($(openedImages).is(':last-child')) {
			$(this).hide();
		} else {
			$(this).show();
		}
		imgsrc = $(openedImages).find("img").attr("src");

		var name = $(openedImages).find("img").attr("src");
	    var parts = name.split('/');
	    name = parts[parts.length-1];
	    
	    imgsrc = imgsrc.replace(name, name);

		altertext = $(openedImages).find("img").attr("alt");
		openedImages = $(openedImages).find(".gallery-overlay");
		$("#image_lightbox").find("img").fadeOut("slow", function() {
			$("#image_lightbox").find("img").attr("src", imgsrc);
			$("#image_lightbox_label").html(altertext);
			$("#image_lightbox").find("img").fadeIn("slow");
		});
	});

	$(".previous_image_btn").on('click',function() {
		$(".next_image_btn").show();
		openedImages = $(openedImages).parent().prev();
		if ($(openedImages).is(':first-child')) {
			$(this).hide();
		} else {
			$(this).show();
		}
		imgsrc = $(openedImages).find("img").attr("src");

		var name = $(openedImages).find("img").attr("src");
	    var parts = name.split('/');
	    name = parts[parts.length-1];
	    
	    imgsrc = imgsrc.replace(name, name);

		altertext = $(openedImages).find("img").attr("alt");
		openedImages = $(openedImages).find(".gallery-overlay");
		$("#image_lightbox").find("img").fadeOut("slow", function() {
			$("#image_lightbox").find("img").attr("src", imgsrc);
			$("#image_lightbox_label").html(altertext);
			$("#image_lightbox").find("img").fadeIn("slow");
		});
	});	

	$("#image_lightbox").keydown(function(e) {
		if(e.keyCode == 37) { // left
			if($(".previous_image_btn").css("display") == "block") {
				$(".previous_image_btn").trigger("click") 
			}
		}
		else if(e.keyCode == 39) { // right
			if($(".next_image_btn").css("display") == "block")	{
				$(".next_image_btn").trigger("click");
			}
		}
	});


}); 