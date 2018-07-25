<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<a class="btn btn-success" href="{{ url('/create') }}" style="margin:10px 5px;"><h3>Создать Новость</h3></a>
<a class="btn btn-primary" href="{{ url('/') }}" style="float:right;margin:10px 5px; ">Главная</a>
<br>
<br>
<br>



<label for="txt" class="badge">Фильтр</label>
<input type="text" id="txt">
<br>
<br>
<table class="table table-bordered">
	<tr><th>Название</th>
	<th>Описание</th>
	<th>Дата публикации</th>
	<th>Аватарка</th></tr>
	@foreach($news as $new)
	<tr>
		<td style="display:none">{{ $new->id }}</td>
		<td class="name">{{ $new->name }}</td>
		<td class="description">{{ $new->description }}</td>
		<td>{{ $new->datePublished }}</td>
		<td>{{ $new->avatar }}</td>
		<td><a href="#" class="editReddit" >Редактировать</a></td>
		<td><a href="{{ url('/delete') }}<?php echo "/" ?>{{$new->id}}">Удалить</a></td>
	</tr>
	@endforeach
</table>
<div class="text-center">{!! $news->links(); !!}</div>


<script>
	document.addEventListener('click',function(e){

		var link ="{{ url('/edit') }}";

        var edit = document.getElementsByClassName('editReddit');
		var tagLine = document.getElementsByTagName('tr');

		for(var i=0; i<tagLine.length; i++){

			tagLine[i].style.backgroundColor="white";
		}
		var bl=true;

		if(e.target.innerHTML=="Сохранить"){

			e.target.innerHTML="Редактировать";

			e.target.parentElement.previousElementSibling.contentEditable="false";
			e.target.parentElement.previousElementSibling.previousElementSibling.contentEditable="false";
			e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.contentEditable="false";
			e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.contentEditable="false";


			var lin = link + "/" + e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML + "/" + e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML + "/" +  e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML + "/" + e.target.parentElement.previousElementSibling.previousElementSibling.innerHTML + "/" + e.target.parentElement.previousElementSibling.innerHTML;

			
			bl=false;
			window.location = lin;
		}

		if(bl==true){
			if(e.target.innerHTML=="Редактировать"){

			

			e.target.parentElement.parentElement.style.backgroundColor="yellow";

			e.target.parentElement.previousElementSibling.contentEditable="true";
			e.target.parentElement.previousElementSibling.previousElementSibling.contentEditable="true";
			e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.contentEditable="true";
			e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.contentEditable="true";

			for(var i=0; i<edit.length; i++){

			     edit[i].innerHTML="Редактировать";	
			}

			
				e.target.innerHTML="Сохранить";
			
		}


		}

		
})


document.getElementById('txt').addEventListener('keyup',function(e){

	     const text = e.target.value.toLowerCase();

	     var a = document.getElementsByClassName('name');
	     var b = document.getElementsByClassName('description');


	     for(var i=0; i<a.length; i++){


	     	if(a[i].innerHTML.toLowerCase().indexOf(text)!=-1){

			  a[i].parentElement.style.display="table-row";

		     }
		    else
		      {
			a[i].parentElement.style.display='none';
		      } 
	     }
		
});

</script>
</body>
</html>