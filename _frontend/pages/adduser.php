<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .err {
            color: red;
        }
    </style>
</head>

<body>
    <form id="userform">
        <div>
            <div>
                <label for="">name <span class="err" id="e_name"></span></label>
            </div>
            <div>
                <input type="text" name="name">
            </div>
        </div>

        <div>
            <div>
                <label for="">Email <span class="err" id="e_username"></span></label>
            </div>
            <div>
                <input type="text" name="username">
            </div>
        </div>

        <div>
            <div>
                <label for="">Password <span class="err" id="e_password"></span></label>
            </div>
            <div>
                <input type="text" name="password">
            </div>
        </div>

        <div>
            <div>
                <label for="">Status <span class="err" id="e_status"></span></label>
            </div>
            <div>
                <input type="text" name="status">
            </div>
        </div>

        <div>
            <div>
                <label for="">Contact <span class="err" id="e_contact"></span></label>
            </div>
            <div>
                <input type="text" name="contact">
            </div>
        </div>

        <div>
            <div>
                <label for="">Address <span class="err" id="e_address"></span></label>
            </div>
            <div>
                <input type="text" name="address">
            </div>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>

<?=import_twal() ?>
<?=import_tyrux() ?>

<script>
    addEventListener("DOMContentLoaded", function(){
        
        userform.addEventListener("submit", function(){
            event.preventDefault();
            DOM.set_html(".err", "");
            
            const data = DOM.form_object("#userform");



            tyrax.post({
                url: "users/add",
                request: data,
                response: (send)=>{
                    if(send.code == 101){
                        twal.warn({
                            text: "Validation failed"
                        });
                        const errors = send.errors;
                        for(e in errors){
                            DOM.set_html("#e_"+e, errors[e]);
                        }
                    }
                    else if(send.code == 200){
                        twal.ok({
                            title: "Data inserted",
                            text: "Data inserted"
                        }).then(()=>location.reload());
                    }
                }
            })
        });

    });
</script>