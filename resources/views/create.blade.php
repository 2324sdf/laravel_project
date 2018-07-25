
<!DOCTYPE html>
<html>
<head>
	<title>Создать</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<table class="table table-bordered">	
	<tr><th>Название</th>
	<th>Описание</th>
	<th>Аватарка</th></tr>
	<tr><td id="first" contenteditable="true"></td>
	<td id="second" contenteditable="true"></td>
	<td id="third"" contenteditable="true">
	<input type='file' onchange="readURL(this);" />
    <img id="blah" src="#"/>
</td>
	
</tr>
</table>
<br>
<a class="btn btn-primary" id="create" href="#" style="text-decoration: none">Добавить</a>
<a class="btn btn-primary" href="{{ url('/news') }}" style="text-decoration: none">Назад</a>
<p id="pah" style="display:none"></p>
</body>
</html>


<script>
	document.getElementById('first').focus();

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
            $('#pah').html(input.files[0].name); 

        }
    }


	$('#create').click(function(){

		var link= "{{ url('/add') }}";

		var lin = link+"/"+$('#first').html()+"/"+$('#second').html()+"/"+$("#pah").html();

		var a = $('#first').html();
		var b = $('#second').html();
		var c = $('#third').html();

		if(a==""||b==""||c==""){
			alert("Заполните все поля");
			return;
		}


		window.location = lin;
		
	})



</script>