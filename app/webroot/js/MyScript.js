 function getValue(param)
  {
  var x=document.getElementById(param);
  var y= document.getElementById("price");
  var z = document.getElementById("rst");
  var lowest_quantity =document.getElementById("lowest_quantity");
  var largest_quantity =document.getElementById("largest_quantity");
   
  if(y===null){
       y.innerText='المرجو اختيار خدمة';
    return false;
}
    else{
        if(!isNaN(largest_quantity.innerText) && !isNaN(lowest_quantity.innerText)){
            //alert(x.value);
            if (!isNaN(y.innerText) && !isNaN(x.value) && parseInt(x.value) >= parseInt(lowest_quantity.innerText)&& parseInt(x.value) <= parseInt(largest_quantity.innerText) ) {
              var reduction = document.getElementById("reduction").value;
                 var price = (parseInt(x.value)*parseInt(y.innerText))/1000 ;
                 var price_comition = (price*reduction)/100;
                   z.innerText= price - price_comition + '$';
            }else{
                z.innerText='المرجو التأكد من العدد المطلوب';
                    return false;
                }
        }
    }


}
  
  function get_follow()
  {
      var x = document.getElementById('num_follows').innerText;
      if(parseInt(x)>=0)
      {
         document.getElementById('inp_nul_follow').value = x;
      }
      else
           document.getElementById('inp_nul_follow').value = 0;
      
  }
  
  
function Test_adresse_url(url,j)
 
{
	var x=document.getElementById(url).value;
    var reg = new RegExp('^((http|https):\/\/)?(www[.])?([a-zA-Z0-9]|-)+([.][a-zA-Z0-9(-|\/|=|?)?]+)+$');
    if(reg.test(x))
      {
		var y= document.getElementById(j);
		 y.innerText =x;
      }
    else
      {
		return false;
      }
}

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    for( var i=0; i < 10; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    document.getElementById('CouponCode').value=text;
}