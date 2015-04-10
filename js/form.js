

var i=0; 

function increment(){
     if (i == 5){
          alert("You can not add anymore nicknames");
          throw new Error('This is not an error. This is just to abort javascript');
     }
     else{
          i +=1;
     }
 
}

function removeElement(parentDiv, childDiv){
 

     if (childDiv == parentDiv) {
          alert("The parent div cannot be removed.");
     }
     else if (document.getElementById(childDiv)) {     
          var child = document.getElementById(childDiv);
          var parent = document.getElementById(parentDiv);
          parent.removeChild(child);
     }
     else {
          alert("Child div has already been removed or does not exist.");
          return false;
     }
}

function nameFunction()
{
var r=document.createElement('span');
var y = document.createElement("INPUT");
y.setAttribute("type", "text");
y.setAttribute("placeholder","name");
y.setAttribute("class","form-control input-md");

var g = document.createElement("A");
// g.setAttribute("src", "delete.png");
g.setAttribute("href", "#");
g.setAttribute("class", "btn btn-danger btn-sm");
g.innerHTML = "Remove" ;

increment(); 
y.setAttribute("Name","nickname_"+i);
r.appendChild(y);
g.setAttribute("onclick", "removeElement('myForm','id_"+ i +"')");
r.appendChild(g);
r.setAttribute("id", "id_"+i);
document.getElementById("myForm").appendChild(r);
}

