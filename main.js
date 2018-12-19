var config = {
    apiKey: "AIzaSyBa08eHFq87j7qNOtpGvJ03h904rUPwppA",
    authDomain: "weekendplaner-494c7.firebaseapp.com",
    databaseURL: "https://weekendplaner-494c7.firebaseio.com",
    projectId: "weekendplaner-494c7",
    storageBucket: "weekendplaner-494c7.appspot.com",
    messagingSenderId: "490894679692"
};

firebase.initializeApp(config);
var messagesRef = firebase.database().ref('Event');
  
document.getElementById('form1').addEventListener('submit',submitForm);

//document.getElementById('form_login').addEventListener('submit',login_func);

function submitForm(e){
	e.preventDefault();
	var name=document.getElementById('name').value;
	var address=document.getElementById('address').value;
	var start_date=document.getElementById('start_date').value;
	var end_date=document.getElementById('end_date').value;
	var description=document.getElementById('description').value;
	var author=document.getElementById('author').value; // itt a Session['user'] erteket kell beszurni
	var img="http://imagini3.metalhead.ro/image/1/650/0/60089316/Rockstadt-Extreme-Fest-Open-Air-2013.jpg"
	//firebase.database().ref('/userProfile').push(userProfile);
	console.log('submitForm-ban !');
	saveMessage(name,address,start_date,end_date,description,author,img);
}

function saveMessage(name,address,start_date,end_date,description,author,img){
	console.log('saveMessage-ben !');
	var newMessageRef = messagesRef.push();
	newMessageRef.set({
		address:address,
		author:author,
		description:description,
		end_date:end_date,
		img:img,
		name:name,
		start_date:start_date
	});
	document.getElementById('name').value='';
	document.getElementById('address').value='';
	document.getElementById('start_date').value='';
	document.getElementById('end_date').value='';
	document.getElementById('description').value='';
	document.getElementById('author').value='';
}
