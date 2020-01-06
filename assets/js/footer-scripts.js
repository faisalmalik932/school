$(function() {
    // var branchid = getUrlParameter('branch');
    // $('#branch').val(branchid);
  
    var branchVal = localStorage.getItem("branchValue")
    console.log(branchVal);
    $('#branch').val(branchVal);
	
});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};
