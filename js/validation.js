function regvalidate()
{
	var name = document.regform.fullname.value;
	var email = document.regform.email.value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var spaname = document.regform.spaname.value;
	var description = document.regform.des.value;
	var landmark = document.regform.landmark.value;
	var address = document.regform.address.value;
	var landline = document.regform.landline.value;
	var mobile = document.regform.mobile.value;
	var operating = document.regform.hours.value;
	var membership = document.regform.membership.value;
	var area = document.regform.area.value;
	var type = document.regform.type.value;
	var price = document.regform.price.value;
	var image = document.regform.image.value;

if (name==null || name=="") {

	alert("Name must be filled out");
    return false;
}
if (email==null || email=="") {

	alert("Email must be filled out");
    return false;
}
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
  if (spaname==null || spaname=="") {

	alert("Spaname must be filled out");
    return false;
}
if (description==null || description=="") {

	alert(" Spa description must be filled out");
    return false;
}
if (landmark==null || landmark=="") {

	alert("Landmark must be filled out");
    return false;
}
if (address==null || address=="") {

	alert("Address must be filled out");
    return false;
}
if (landline==null || landline=="") {

	alert("Landline number must be filled out");
    return false;
}
if (mobile==null || mobile=="") {

	alert("Mobile number must be filled out");
    return false;
}
if (operating==null || operating=="") {

	alert("Operating hour must be filled out");
    return false;
}
if (membership==null || membership=="") {

	alert("Membership must be filled out");
    return false;
}
if (area==null || area=="") {

	alert("Treatment area type must be filled out");
    return false;
}
if (type==null || type=="") {

	alert("Therapist type must be filled out");
    return false;
}
if (price==null || price=="") {

	alert("Price must be filled out");
    return false;
}
if (image==null || image=="") {

	alert("You must upload some image for your banner");
    return false;
}


}