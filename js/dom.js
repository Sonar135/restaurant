$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();





  $(document).ready(function() {
    $(".no_acc").click(()=>{
        $(".login").css("display", "none")
        $(".signup").css("display", "flex")
    })
    
    $(".has_acc").click(()=>{
        $(".login").css("display", "flex")
        $(".signup").css("display", "none")
    })


    $(".search_btn").click(()=>{
        $(".search_cont").toggleClass("search_cont_active");
        $("#my_input").focus()
    })
    
    
    
    
    $('#toggle').click(()=>{
        $(".edit_overlay").css("display", "flex");
    })
    
    $(".exit").click(()=>{
        $(".edit_overlay").css("display", "none");
    })

    $("#my_btn").prop("disabled", true);

    $("#my_input").on("input", function() {
        if ($(this).val() !== "") {
            $("#my_btn").prop("disabled", false);
        } else {
            $("#my_btn").prop("disabled", true);
        }
    });
    

    
    
    
    
    $('#image').change(function(){
        // Get the selected file
        const file = $(this)[0].files[0];
        
        // Check if a file is selected
        if (file) {
            // Get the filename
            const fileName = file.name;
            
            // Output the filename
            console.log("Selected file: " + fileName);
    
            $(".label").html(fileName);
           
        } else {
            console.log("No file selected");
        }
    });




    let lists = document.querySelectorAll("#list");


    lists.forEach(list => {
        list.addEventListener("click", () => {
            $("#selected").html(list.innerHTML);
            $("#myInput").val(list.innerHTML);
        });
    });
    
    

    let value = parseInt($("#value").val());

    $(".plus").click(() => {
        
        value = value + 1;
        $("#value").val(value);
    });
    
    $(".minus").click(() => {
        if(value>1){
            value = value - 1;
            $("#value").val(value);
        }
     
    });
    

    })