$(document).ready(function(){
    //Show loader image
    $("#loaderImage").show();
    
    //Show contacts on page load
    showContacts();
    
    //Add contact
    $(document).on("submit","#addContact",function(){
        //Show loader image
        $("#loaderImage").show();
        
        //Post data from form
        $.post("add_contact.php", $(this).serialize()).done(function(data){
            console.log(data);
            $('#addModal').foundation("close");
            showContacts();
        });
        return false;
    });
    
    //Edit contact
    $(document).on("submit",".editModal form",function(e){
        //Show loader image
        $("#loaderImage").show();
        
        //Post data from form
        $.post("edit_contact.php", $(this).serialize()).done(function(data){
            console.log(data);
            $(".editModal").hide();
            $(".reveal-overlay").hide();
            showContacts();
        });
        return false;
    });
    
    //Delete contact
    $(document).on("submit","#deleteContact",function(){
        //Show loader image
        $("#loaderImage").show();
        
        //Post data from form
        $.post("delete_contact.php", $(this).serialize()).done(function(data){
            console.log(data);
            showContacts();
        });
        return false;
    });
    
    //Show modal on edit buttons functionality
    $(document).on("click", ".edit-btn", function(){
        var id=$(this).attr("data-open");
        var popup = new Foundation.Reveal($('#'+id));
        popup.open();
    });
});

//Show contacts
function showContacts(){
    console.log("Showing contacts...");
    setTimeout(function(){
        $('#pageContent').load('contacts.php',function(){
            $('#loaderImage').hide();
        });
    },1000);
}