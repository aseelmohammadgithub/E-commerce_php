<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container{
            display:flex;
            align-items:center;
            justify-content:space-around;
            margin-top:70px
        }
        .social-media-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 30px;
        }

        .social-media-container a {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .social-media-container img {
            width: 80px;
            height: 80px;
            margin-right: 5px;
            cursor: pointer;
        }

        .right-image-container img {
            width: 300px;
            height: auto;
        }

        .footer {
            background-color: #cce5ff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
<h3 class="m-auto ml-7">For Collaborations contact us on</h3>
    <div class="container">
        <div class="social-media-container">
        <a href="https://instagram.com/aseel_mohammad_126?igshid=ZDc4ODBmNjlmNQ==" target="_blank">
            <img src="./user_images/instagram_logo.png" alt="Instagram">
        </a>
        <a href="https://www.linkedin.com/in/shaik-mohammad-aseel-910a82249" target="_blank">
            <img src="./user_images/linkedin_logo.png" alt="LinkedIn">
        </a>
        <a href="mailto:teamshopikart@gmail.com">
            <img src="./user_images/gmail_logo.png" alt="Gmail">
        </a>
        </div>

        <div class="right-image-container">
        <img src="./user_images/clg.jpeg" alt="Your Image">
        </div>
    </div>
    <h4>Report an issue</h4>
    <form action="https://formspree.io/f/mnqkazng"
  method="POST">
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-11 m-auto" value=""placeholder="Enter your working email address :"name="email">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-10 m-auto" value=""placeholder="Report an issue "name="text">
        </div>
        <button type="submit" class="bg-secondary text-light">Submit</button>
    </form>
    <div class="footer bg-info p-2 text-center">
        <p>All rights reserved © ℑ𝔫𝔫𝔬𝔳𝔞𝔱𝔦𝔬𝔫 𝔴𝔦𝔱𝔥 𝓐𝓼𝓮𝓮𝓵</p>
    </div>
</body>
</html>
