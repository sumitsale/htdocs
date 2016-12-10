var APP={};$(document).ready(function()
{$("#Main-Side li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Side(ID)});});$("#Main-Style li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Style(ID)});});$("#Main-Size li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Size(ID)});});$("#Main-Theme li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Theme(ID)});});$("#Main-Label li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Label(ID)});});$("#Main-Shadow li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Shadow(ID)});});$("#Main-Corners li").each(function(i)
{var ID=$(this).prop("id");$(this).click(function(){APP.Corners(ID)});});APP.Side("Side-Left");APP.Style("Style-Square");APP.Size("Size-Small");APP.Theme("Theme-Color");APP.Label("Label-Curve");APP.Shadow("Shadow-None");APP.Corners("Corners-None");});APP.Side=function(ID)
{$("#Main-Side li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Pos-Left Pos-Right");if(ID==="Side-Left")
$("#Social-Sidebar").addClass("Pos-Left");else
$("#Social-Sidebar").addClass("Pos-Right");};APP.Style=function(ID)
{$("#Main-Style li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Circle");if(ID==="Style-Circle")
$("#Social-Sidebar").addClass("Circle");};APP.Size=function(ID)
{$("#Main-Size li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Large");if(ID==="Size-Large")
$("#Social-Sidebar").addClass("Large");};APP.Theme=function(ID)
{$("#Main-Theme li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Theme-Light Theme-Trans Theme-Color");if(ID!=="Theme-Dark")
$("#Social-Sidebar").addClass(ID);};APP.Label=function(ID)
{$("#Main-Label li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Label-Square Label-Curve Label-Round Label-Fancy");$("#Social-Sidebar").addClass(ID);};APP.Shadow=function(ID)
{$("#Main-Shadow li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Shadow Shadow-All");if(ID==="Shadow-Box")
$("#Social-Sidebar").addClass("Shadow");else if(ID==="Shadow-Links")
$("#Social-Sidebar").addClass("Shadow-All");};APP.Corners=function(ID)
{$("#Main-Corners li").prop("class",'');$("#"+ID).prop("class","Active");$("#Social-Sidebar").removeClass("Corners Corners-All");if(ID==="Corners-Box")
$("#Social-Sidebar").addClass("Corners");else if(ID==="Corners-Links")
$("#Social-Sidebar").addClass("Corners-All");};



