$(document).ready(function(){
    $("#changepass").hide();
    $('#doipass').click(function() {
        if (!$(this).is(':checked')) {
            $("#changepass").hide();
            var x = document.getElementById("doipass").value = "0";
        }
        else
        {
            $("#changepass").toggle(300);
            var x = document.getElementById("doipass").value = "checked";

        }
    });
});

$(document).ready(function() {
      $('button[id^="btnxoa"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', text);
        }
    });
});

$(document).ready(function() {
    $('button[id^="btn_deleteemploy"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/jobs/employment/delete/'+ text);
        }
    });
});

$(document).ready(function() {
    $('button[id^="btn_delpo"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true) {
            var text = $(this).attr('value'); 
            var url = base_url+'admin/jobs/add-new-job/delete/position';
            $.post(url, {poid: text}, function(data) {
                if (data==1) {//xoa dc
                    $('#mess').html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Well done!</strong>  Position Has Been Deleted!.</div>');
                }
                else
                {
                    $('#mess').html('<div class="alert alert-warning"><a class="close" data-dismiss="alert">×</a><strong>Warning!</strong>  Errors in the process of deleting data!Try again.!.</div>');
                }
                window.location.reload(true);
            });
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_deljob"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/jobs/list-of-jobs/delete/'+ text);
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_deletecom"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/company/infomation/delete/'+ text);
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_dellegal"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/legal/list-of-legal/delete/'+ text);
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_delrequest"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/customers/list-of-requests/delete/'+ text);
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_delmf"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/apps/main-features/delete/'+ text);
        }
    });
});


$(document).ready(function() {
      $('button[id^="btnupdate"]').click(function () {
        var text = $(this).attr('value'); 
        $(location).attr('href', text);
    });
});


$("#icon").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#image");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "img-circle img-responsive"
            }).appendTo(image_holder);

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});


$("#id_os_img").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#viewos");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "img-thumbnail img-responsive",
                "data-holder-rendered" : "true"
            }).appendTo(image_holder);

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});

$("#le_img").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#le_viewimg");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "img-thumbnail img-responsive",
                "data-holder-rendered" : "true"
            }).appendTo(image_holder);

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});

$("#mf_ico").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
        document.getElementById("mf_iconhd").value = "1";
        var image_holder = $("#viewiconmf");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "img-thumbnail img-responsive",
                "data-holder-rendered" : "true",
                "style" : "height:70px; width:70px;"
            }).appendTo(image_holder);

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});

function addos(){
    var table = document.getElementById("addos");
    var tableBody = document.getElementById("listos");
    var rows = document.getElementById("addos").rows.length;
    var del = document.createElement("A");
    var osname = document.createElement("INPUT");
    var link = document.createElement("INPUT");
    var img = document.createElement("INPUT");
    var dsos = document.getElementById("id_dsos");
    var stt = (rows-1);

    dsos.setAttribute("value",rows);
    osname.setAttribute("type","text");
    osname.setAttribute("id","osname"+stt);
    osname.setAttribute("name","osname"+stt);
    osname.setAttribute("class","form-control");
    osname.setAttribute("placeholder",stt);

    link.setAttribute("type","text");
    link.setAttribute("id","link"+stt);
    link.setAttribute("name","link"+stt);
    link.setAttribute("class","form-control");
    link.setAttribute("placeholder","Link");

    img.setAttribute("type","file");
    img.setAttribute("id","img"+stt);
    img.setAttribute("name","img"+stt);

    table.appendChild(tableBody);
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    var td1 = document.createElement('TD');
    var td2 = document.createElement('TD');
    var td3 = document.createElement('TD');
    var td4 = document.createElement('TD');
    
    td4.appendChild(del);
    td1.appendChild(osname);
    td2.appendChild(link);
    td3.appendChild(img);

    del.setAttribute("onclick","deleterow()");
    del.innerHTML = 'Delete';
    del.setAttribute("class","btn btn-danger");
    del.setAttribute("id","del_"+stt);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);

}

function deleterow () {
    var i = document.getElementById("addos").rows.length;
    document.getElementById("addos").deleteRow(i-1);
    var dsos = document.getElementById("id_dsos");
    var a = document.getElementById("addos").rows.length;
    dsos.setAttribute("value",a-1);

}

function validateFileExtension(fld) {
    if(!/(\.png|\.jpg|\.jpeg)$/i.test(fld.value)) {
        alert("Invalid image file type.");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }   
    return true;
}

$(document).ready(function() {
    $("#btn_updatedone").hide();
    $("#btn_updatecom").hide();
    $("#editcontact").hide();
    $("#editlegal").hide();
    $("#btn_updatemf").hide();
    if (result.length==1) {
        var open = document.getElementById("cl_"+result[0]);
        open.setAttribute("class","open");
    }
    else{
        var open = document.getElementById("cl_"+result[0]);
        open.setAttribute("class","open");
        var active = document.getElementById("at_"+result[1]);
        active.setAttribute("class","active");
    };
    
});
function resetformos() {
    document.getElementById("addostoapp").reset();
    $("#btn_updatedone").hide();
    $("#btn_savedone").show();
    document.getElementById("nametableos").innerHTML = "Add OS To App";
    document.getElementById("addostoapp").action = base_url+"admin/apps/os/add-os-to-app";
}
function resetformaddjob() {
    document.getElementById("addjob").reset();
}
function resetformaddle() {
    document.getElementById("addlegal").reset();
}
function resetformaddpo() {
    document.getElementById("addposition").reset();
}

function resetforminfo() {
    document.getElementById("infomation").reset();
    $("#btn_updatecom").hide();
    $("#btn_savecom").show();
    document.getElementById("addostoapp").action = base_url+"admin/company/infomation/add-company";
}

function resetformsocial() {
    document.getElementById("social").reset();
    document.getElementById("addostoapp").action = base_url+"admin/apps/company/infomation/add-social";
}

function resetformcont() {
    document.getElementById("editcont").reset();
    $("#editcontact").hide();
}

function closeeditlegal() {
    document.getElementById("editle").reset();
    $("#editlegal").hide();
}


$(document).ready(function() {
      $('#btn_deleteos').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', text);
        }
    });
});

$(document).ready(function() {
      $('button[id^="btn_updateos"]').click(function () {
        var osid = $(this).attr('value'); 
        for (var i = 0; i < listos.length; i++) {
            if (listos[i]["os_id"] == osid) 
            {
                document.getElementById("addostoapp").action = base_url+"admin/apps/os/update/"+osid;
                $(".alert-danger").alert('close')
                $("#btn_updatedone").show();
                $("#btn_savedone").hide();
                document.getElementById("nametableos").innerHTML = 'Edit OS';
                document.getElementById("os_appadd").disabled = true;
                document.getElementById("os_appadd").value = listos[i]['pro_id'];
                document.getElementById("os_name").value = listos[i]['os_name'];
                document.getElementById("os_link").value = listos[i]['os_link'];
                var image_holder = $("#viewos");
                image_holder.empty();
                $("<img />", {
                    "src": base_url+"assets/back-end/images/apps/"+listos[i]['pro_id']+"/"+listos[i]['os_icon'],
                    "class": "img-thumbnail img-responsive",
                    "data-holder-rendered" : "true"
                }).appendTo(image_holder);
                image_holder.show();
            };
        };
    });
});



$(document).ready(function() {
      $('button[id^="btn_editlegal"]').click(function () {
        var leid = $(this).attr('value'); 
        for (var i = 0; i < legal.length; i++) {
            if (legal[i]["lec_id"] == leid) 
            {
                $("#editlegal").show();
                document.getElementById("editle").action = base_url+"admin/legal/list-of-legal/update/"+leid;
                $(".alert-danger").alert('close');
                
                document.getElementById("le_title").value = legal[i]['lec_title'];
                CKEDITOR.instances.le_content.setData(legal[i]['lec_content']);
            };
        };
    });
});

$(document).ready(function() {
      $('button[id^="btn_deleteos"]').click(function () {
        if(confirm("Bạn có muốn xóa OS cua app nay?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', text);
        }
    });
});



$(document).ready(function() {
    if (typeof lati !== 'undefined' && typeof longi !== 'undefined') {
        var myCenter=new google.maps.LatLng(lati,longi);

        function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:10,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          });

        marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    };
});



function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
function showPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    $('#id_com_longi').val(lon);
    $('#id_com_lati').val(lat);
    $('#hd_long').val(lon);
    $('#hd_lat').val(lat);
}

$(document).ready(function() {
      $('button[id^="btn_upcom"]').click(function () {
        var comid = $(this).attr('value'); 
        for (var i = 0; i < com.length; i++) {
            if (com[i]["com_id"] == comid) 
            {
                document.getElementById("infomation").action = base_url+"admin/company/infomation/update/"+comid;
                $(".alert-danger").alert('close')
                $("#btn_updatecom").show();
                $("#btn_savecom").hide();
                document.getElementById("id_com_name").value = com[i]['com_name'];
                document.getElementById("id_com_phone").value = com[i]['com_phone'];
                document.getElementById("id_com_address").value = com[i]['com_address'];
                document.getElementById("id_com_fax").value = com[i]['com_fax'];
                document.getElementById("id_com_longi").value = com[i]['com_longi'];
                document.getElementById("id_com_lati").value = com[i]['com_lati'];
            };
        };
    });
});



function addnamesocial () {
    var stt = document.getElementById("social_select").options.selectedIndex;
    var text = document.getElementById("social_select").options[stt].text;
    var soci_name = document.getElementById("social_name");
    soci_name.value = text;
    $('#hd_snid').val(text);

}

$(document).ready(function() {
      $('button[id^="btn_deletesocial"]').click(function () {
        if(confirm("Bạn có muốn xóa?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/company/infomation/social/delete/'+text);
        }
    });
});


$(document).ready(function() {
      $('button[id^="btn_editcont"]').click(function () {
        var contid = $(this).attr('value'); 
        for (var i = 0; i < listcon.length; i++) {
            if (listcon[i]["con_id"] == contid) 
            {
                $(".alert-danger").alert('close')
                $("#editcontact").show();
                var action = document.getElementById("editcont").action
                document.getElementById("editcont").action = action+'/'+contid;
                document.getElementById("cont_name").value = listcon[i]['con_name'];
                document.getElementById("cont_email").value = listcon[i]['con_email'];
                document.getElementById("cont_phone").value = listcon[i]['con_phone'];
                document.getElementById("cont_pageuse").value = listcon[i]['con_position'];
            };
        };
    });
});

$(document).ready(function() {
      $('button[id^="btn_deletecont"]').click(function () {
        if(confirm("Bạn có muốn xóa Contact nay?")==true)
        {
            var text = $(this).attr('value'); 
            $(location).attr('href', base_url+'admin/company/list-of-contacts/delete/'+text);
        }
    });
});

$(document).ready(function() {
    $('#btn_chatbox').click(function(event) {
        var LHCChatboxOptions = {hashchatbox:'empty',identifier:'default',status_text:'Chatbox'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = '//localhost:8080/sys/livehelp/index.php/chatbox/getstatus/(position)/bottom_right/(top)/300/(units)/pixels/(width)/300/(height)/300/(chat_height)/220';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
    });
});
