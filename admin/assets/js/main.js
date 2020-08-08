$(document).on('focus',".dat",function(){
	$(this).datepicker({ dateFormat:'yy-M-dd'})
});
$(document).on('focus',".dat1",function(){
	$(this).datepicker({ dateFormat:'yy-M-dd',changeYear: true,yearRange: '1970:2020'})
});
$("#course").change(function(){
	var fee = $(this).children(":selected").attr("id");
	$("#fee").val(fee);
	$("#dised").val("");
	$("#dis").val("");
});
$("#dis").keyup(function(){
	var fee = $("#fee").val();
	var dis = $(this).val();
	var dised = fee - dis;
	$("#dised").val(dised);
});
// installment show
$("#btn_ins").click(function(e){
	e.preventDefault();
	//alert($("#dised").val());return false;
	if($("#dised").val() == ""){
		var fee = $("#fee").val();
	}
	else{
		var fee = $("#dised").val();
	} 
	var course = $("#course").val();
	var ins_no = $("#ins").val();
	var ins = fee / ins_no;
	if(course == ""){
		$("#course").css({"border":"1px solid #F00"});
		$("#course").focus();
		return false;
	}
	else{
		$("#course").css({"border":"1px solid #CCC"});
		if($("#batch").val() == ""){
			$("#batch").css({"border":"1px solid #F00"});
			return false;
		}
		else{
				$("#batch").css({"border":"1px solid #CCC"});
				if($("#officer").val() == ""){
					$("#officer").css({"border":"1px solid #F00"});
				}
				else{
					$("#officer").css({"border":"1px solid #CCC"});
				var htm ="";
				var count =0;
				var m_name = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; 
				for(var a=0;a<(ins_no*2);a++){
					if(a%2 == 0){
						d = new Date($("#adm_date").val()).addMonths(count);
						//var mon = d.toString("M");
						var mon = m_name[d.getMonth()];
						var y = d.getFullYear();
						var da = pad(d.getDate(),2,'0');
						daat = y+'-'+mon+'-'+da;
						htm += '<div class="col-sm-6"><div class="form-group"><input type="text" class="form-control dat" value="'+daat+'"></div></div>';
						count++;
					}
					else{
						htm += '<div class="col-sm-6"><div class="form-group"><input type="text" class="form-control datval" value="'+ins+'"></div></div>';
					}									
				}
				$("#install").html(htm);
				$(".ins").slideDown(1000);
				$("html, body").animate({ scrollTop: $(document).height() }, 1000);
			}
		}
	}
});

// adjustment of installments

$(document).on("keyup",".datval",function(){
	if($("#dised").val() == ""){
		var fee = Number($("#fee").val());
	}
	else{
		var fee = Number($("#dised").val());
	}
	var len_index = $(".datval").length;
	var cur_index = $(".datval").index(this);
	var nex_index = cur_index+1;
	var nex_val = Number($(".datval").eq(nex_index).val());
	var total_amount = 0;
	for(var a=0;a<len_index;a++){
		total_amount += Number($(".datval").eq(a).val());
	}
	if(total_amount < fee){
		var remain = fee - total_amount;
		var fin = nex_val + remain;
	}
	else{
		var remain = total_amount - fee;
		var fin = nex_val - remain;
	}
	$(".datval").eq(nex_index).val(fin);
});

// ajax for form submiting
$(document).on("click","#reg",function(e){
	//window.location.href="index.php";
	e.preventDefault();
	// get values of fields
	//$("#screen").fadeIn();
	var bas = $(".base input").length;
	// basic info
	for(var a=0;a<bas;a++){
		if(a==0 || a==1){
			if($(".base input").eq(a).val() == ""){
				$(".base input").eq(a).css({"border":"1px solid #F00"});
				$("html, body").animate({ scrollTop: 0 }, 1000);
				$(".base input").eq(a).delay(1000).focus();
				return false;
			}
			else{
				$(".base input").eq(a).css({"border":"1px solid #CCC"});
			}
		}
		else{
			if($(".base input").eq(2).val() == "" && $(".base input").eq(3).val() == "" && $(".base input").eq(3).val() == ""){
				$(".base input").eq(a).css({"border":"1px solid #F00"});
				$("html, body").animate({ scrollTop: 0 }, 1000);
				$(".base input").eq(a).delay(1000).focus();
				return false;
			}
			else{
				$(".base input").eq(a).css({"border":"1px solid #CCC"});
			}
		}
		if(a==5){break;}
	}
	// for course selection
	if($("#course").val() == ""){
		$("#course").css({"border":"1px solid #F00"});
		$("html, body").animate({ scrollTop: 0 }, 1000);
		$("#course").delay(1000).focus();
		return false;
	}
	else if($("#ins").val() == "" || $("#ins").val() == 0){
		$("#ins").css({"border":"1px solid #F00"});
		$("html, body").animate({ scrollTop: 0 }, 1000);
		$("#ins").delay(1000).focus();
		$("#course").css({"border":"1px solid #CCC"});
		return false;
	}
	else{
		$("#course").css({"border":"1px solid #CCC"});
		$("#ins").css({"border":"1px solid #CCC"});
	}
	// fee comparison
	
	if($("#dised").val() == ""){
		var fee = Number($("#fee").val());
	}
	else{
		var fee = Number($("#dised").val());
	}
	
	var total = 0;
	var ins=[];
	for(var b=0;b<$(".datval").length;b++){
		total += Number($(".datval").eq(b).val());
		ins[b]=$(".datval").eq(b).val();
	}
	if(fee != total){
		for(var b=0;b<$(".datval").length;b++){
		$(".datval").eq(b).css({"border":"1px solid #F00"});
		$(".datval").eq(0).focus();
		}
		return false;	
	}
	else{
		for(var b=0;b<$(".datval").length;b++){
		$(".datval").eq(b).css({"border":"1px solid #CCC"});
		}
	}
	var dat=[]; 
	for(var c=0;c<$(".dat").length;c++){
		dat[c] = $(".dat").eq(c).val();
	}
	// send to php file
	var name = $("#name").val();
	var f_name = $("#f_name").val();
	var p_no = $("#p_no").val();
	var f_no = $("#f_no").val();
	var e_no = $("#e_no").val();
	var dob = $("#dob").val();
	var cnic = $("#cnic").val();
	var gen = $("#gen").val();
	var adr = $("#adr").val();
	var email = $("#email").val();
	var course = $("#course").val();
	var fee = $("#fee").val();
	var dis = $("#dis").val();
	var dised = $("#dised").val();
	var batch = $("#batch").val();
	var project = $("#project").val();
	var officer = $("#officer").val();
	var no_of_ins = $("#ins").val();
	var adm_date = $("#adm_date").val();
	var educat = $("#educat").val();
	$.post("assets/php/admission/reg.php",{name:name,f_name:f_name,p_no:p_no,f_no:f_no,e_no:e_no,adr:adr,email:email,course:course,fee:fee,dis:dis,dised:dised,batch:batch,no_of_ins:no_of_ins,dat:dat,ins:ins,adm_date:adm_date,gen:gen,cnic:cnic,dob:dob,project:project,officer:officer,educat:educat},function(data){
		$("#screen").fadeIn();
		if(data =="OK"){
			$("#screen").fadeOut(100);
			$("#screen_msg a#error").fadeOut(500);
			$("#screen_msg").children("h3").html("Student Admition Process Complete!");
			$("#screen_msg").fadeIn(500);
			$("#screen_msg a#ref").fadeIn(500);	
		}
		else{
			$("#screen").fadeOut(100);
			$("#screen_msg a#ref").fadeOut(500);
			$("#screen_msg").children("h3").html(data);
			$("#screen_msg").fadeIn(500);
			$("#screen_msg a#error").fadeIn(500);
		}
	});
});

// fade out screen

$(document).on("click","#screen_msg > a#ref",function(e){
	e.preventDefault();
	$("#screen_msg").fadeOut();
	var url = window.location;
	window.location.href=url;
});
$(document).on("click","#screen_msg > a#error",function(e){
	e.preventDefault();
	$("#screen_msg").fadeOut();
});