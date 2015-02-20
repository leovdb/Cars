// JavaScript Document

function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	var regexS = "[\\?&]" + name + "=([^&#]*)";
	var regex = new RegExp(regexS);
	var results = regex.exec(window.location.search);
	if(results == null)
	{
		return "";
    } 
	else
	{
		return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
}

function addFormElem(paramName)
{
	var paramValue = getParameterByName(paramName);
	var $utmEl = $("<input type='hidden' name='" + paramName + "' value='" + paramValue + "'>");
	if (paramValue != "")
	{
        $("form").first().prepend($utmEl);
	}

}

function addUTMCodesToForm()
{

    var utmParams = [
      "utm_source",
      "utm_medium",
      "utm_campaign",
      "utm_content",
      "utm_term"
    ];

    for (var param in utmParams)
	{
      addFormElem(utmParams[param]);
    }
}