<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FundMeNaija</title>
</head>
<body>
    
<script src="https://formspree.io/js/formbutton-v1.min.js" defer></script>

<script>
  /* paste this in verbatim */
  window.formbutton=window.formbutton||function(){(formbutton.q=formbutton.q||[]).push(arguments);};

  /* customize formbutton here*/     
  formbutton("create", {
    action: "https://formspree.io/f/xrgvzgar",
    title: "How can we help?",
    fields: [
      { 
        type: "email", 
        label: "Email:", 
        name: "email",
        required: true,
        placeholder: "example@email.com"
      },
      {
        type: "textarea",
        label: "Message:",
        name: "message",
        placeholder: "What's on your mind?",
      },
      { type: "submit" }      
    ],
    styles: {
      title: {
        backgroundColor: "#f3613c"
      },
      button: {
        backgroundColor: "#f3613c"
      }
    },
    initiallyVisible: true
  });
</script>
</body>
</html>