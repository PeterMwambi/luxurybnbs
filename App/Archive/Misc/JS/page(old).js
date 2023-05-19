$(document).ready(function () {
  WritePage();
  function GetPage() {
    let pageURI = window.location.pathname;

    switch (pageURI) {
      case "/projects/teambp/app/member-login":
        var page = "login-page";
        break;
      case "/projects/teambp/app/member-registration":
        var page = "registration-page";
        break;
    }
    return page;
  }

  function WritePage() {
    let page = GetPage();

    switch (page) {
      case "login-page":
        WriteTitle("Login Form");
        WriteProgressBarColor("blue", "progress-bar");
        WriteProgressBar(false, "progress-bar", "50", "step 1 out of 2");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 1: Account Information"
        );
        WriteButtonColor("blue", "action-button");
        ConfirmUsernameOrEmail("userinfo");
        WriteSpinnerColor("blue", "spinner-grow");
        WriteLoginRegisterAction(
          "sign-in",
          "member-registration",
          "I dont have an account"
        );
        WriteInfoText("info-text", "Your login was successful");
        break;
    }
  }

  function ConfirmUsernameOrEmail(className) {
    let emailpattern = /^[a-z0-9]+@+[a-z]+.+[a-z]{2,5}$/;
    $("." + className).blur(function (e) {
      if (emailpattern.test($(this).val())) {
        $(this).attr("type", "email");
        $(this).attr("name", "email");
      } else {
        $(this).attr("type", "text");
        $(this).attr("name", "username");
      }
    });
  }

  function WriteLoginRegisterAction(className, href, message) {
    $("." + className)
      .attr("href", href)
      .html(message);
  }

  function WriteTitle(message) {
    $("title").html(message);
  }

  function WriteInfoText(className, message) {
    $("." + className).html(message);
  }

  // //Duplicated from forms.js
  // function HideItemByClassName(classname) {
  //   $("." + classname).addClass("d-none");
  // }

  //Duplicated from write progressbar color
  function WriteSpinnerColor(color, className) {
    let defaultColor = "text-success";
    let blueColor = "text-primary";
    switch (color) {
      case "green":
        if ($("." + className).hasClass(blueColor)) {
          $("." + className)
            .removeClass(blueColor)
            .addClass(defaultColor);
        }
        break;
      case "blue":
        if ($("." + className).hasClass(defaultColor)) {
          $("." + className)
            .removeClass(defaultColor)
            .addClass(blueColor);
        }
        break;
    }
  }

  //Duplicated from write progressbar color
  function WriteButtonColor(color, className) {
    let defaultColor = "btn-success";
    let blueColor = "btn-primary";
    switch (color) {
      case "green":
        if ($("." + className).hasClass(blueColor)) {
          $("." + className)
            .removeClass(blueColor)
            .addClass(defaultColor);
        }
        break;
      case "blue":
        if ($("." + className).hasClass(defaultColor)) {
          $("." + className)
            .removeClass(defaultColor)
            .addClass(blueColor);
        }
        break;
    }
  }

  //Duplicated from forms.js
  function WriteFormStepHeading(defaultText = true, className, message) {
    let defaultFormStepHeadingText = "Step 1: Personal Information";
    switch (defaultText) {
      case true:
        $("." + className).html(defaultFormStepHeadingText);
        break;
      case false:
        $("." + className).html(message);
        break;
    }
  }

  //Duplicated from forms.js
  function WriteProgressBar(defaultText = true, className, width, message) {
    let defaultProgressBarText = "Step 1 out of 4";
    switch (defaultText) {
      case true:
        $("." + className).html(defaultProgressBarText);
        $("." + className).attr("style", "width:25%");
        break;
      case false:
        $("." + className).html(message);
        $("." + className).attr("style", "width:" + width + "%;");
        break;
    }
  }

  /**
   * @param {string} color
   * @param {string} className
   */
  function WriteProgressBarColor(color, className) {
    let defaultColor = "bg-success";
    let blueColor = "bg-primary";
    switch (color) {
      case "green":
        if ($("." + className).hasClass(blueColor)) {
          $("." + className)
            .removeClass(blueColor)
            .addClass(defaultColor);
        }
        break;
      case "blue":
        if ($("." + className).hasClass(defaultColor)) {
          $("." + className)
            .removeClass(defaultColor)
            .addClass(blueColor);
        }
        break;
    }
  }
});
