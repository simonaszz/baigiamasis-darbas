function mainThumUrl(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $("#mainThmb").attr("src", e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//multiple img
$(document).ready(function () {
    $("#multiImg").on("change", function () {
        //on file input change
        if (
            window.File &&
            window.FileReader &&
            window.FileList &&
            window.Blob
        ) {
            //check File API supported browser
            let data = $(this)[0].files; //this file data

            $.each(data, function (index, file) {
                //loop though each file
                if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                    //check supported file type
                    let fRead = new FileReader(); //new filereader
                    fRead.onload = (function (file) {
                        //trigger function on successful read
                        return function (e) {
                            let img = $("<img/>")
                                .addClass("thumb")
                                .attr("src", e.target.result)
                                .width(100)
                                .height(80); //create image element
                            $("#preview_img").append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
//when selected category shows sub category auto
