/**
 * @author Peter Mwambi
 * @content Ajax Handler
 */

"use strict";

// function GetRoutePrefix() {
//   fetch("/projects/fancyphp/app/Config/Routes/RoutePrefix.json")
//     .then((response) => {
//       return response.json();
//     })
//     .then((data) => console.log(data));
// }

$(document).ready(function () {
  /**
   * @const url
   * The ajax request handler url. All data
   * submitted to an ajax handler is sent to this
   * reference url
   */
  const url = window.location.pathname;

  /**
   * @const forms
   * Consist of submitted form names identified
   * by unique form ids. Form ids must be defined
   * by the id html attribute
   */
  const forms = [
    "registration-form-step-1",
    "registration-form-step-2",
    "registration-form-step-3",
    "registration-form-step-4",
    "registration-form-step-5",
    "login-form-step-1",
    "login-form-step-2",
  ];

  const FcInputs = [
    "firstname",
    "lastname",
    "county",
    "sub-county",
    "area",
    "city",
    "skills",
    "bio",
  ];

  /**
   *
   * @param {string} identifier
   */

  function SetToLowerCase(identifier) {
    let item = $("input[name='" + identifier + "']");
    item.blur(function () {
      $(this).val(
        $(this).val().replace($(this).val(), $(this).val().toLowerCase())
      );
    });
  }

  function CapitalizeFirstLetter(identifier) {
    let item = $("input[name='" + identifier + "']");
    item.blur(function () {
      $(this).val(
        $(this)
          .val()
          .replace(
            $(this).val().charAt(0),
            $(this).val().charAt(0).toUpperCase()
          )
      );
    });
  }

  FcInputs.forEach(SetToLowerCase);
  FcInputs.forEach(CapitalizeFirstLetter);

  function RunAjaxQuery(identifier) {
    let item = $("#" + identifier);
    $(item).submit(function (e) {
      e.preventDefault();
      ToggleAlertVisibility("hide", "alert");
      ModifyHelpText(false, "teambp__form-helpText", "Please Wait");
      DisableButton();
      ToggleSpinnerVisibility("show");
      ToggleButtonSpinner("show", "btn-spinner");
      WriteButtonText(false, "btn-info", "Please Wait");
      setTimeout(() => {
        $.ajax({
          type: "post",
          url: url,
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            ToggleSpinnerVisibility("hide");
            ToggleButtonSpinner("hide", "btn-spinner");
            ModifyHelpText(true, "teambp__form-helpText");
            if (response.flag === 0) {
              GetErrorMessage(response.message, "alert");
              WriteButtonText(true, "btn-info");
              EnableButton();
            } else {
              if (response.flag === 1) {
                GetSuccessMessage(response.message, "alert");
                setTimeout(function () {
                  ModifyHelpText(false, "teambp__form-helpText", "Please Wait");
                  ToggleSpinnerVisibility("show");
                }, 5000);
                setTimeout(function () {
                  ModifyHelpText(true, "teambp__form-helpText");
                  ToggleSpinnerVisibility("hide");
                  GoToNextStep(response.next);
                }, 6000);
              }
            }
          },
        });
      }, 3000);
    });
  }
  forms.forEach(RunAjaxQuery);

  function GoToNextStep(step) {
    switch (step) {
      case "GoToLoginStep2":
        HidePreviousStepForm("login-form-step-1");
        ShowNextStepForm("login-form-step-2");
        WriteProgressBar(false, "progress-bar", "100", "Step 2 out of 2");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 2: Security Information"
        );
        WriteButtonText(false, "btn-info", "Go to my account");
        EnableButton();
        break;
      case "GoToRegistrationStep2":
        HidePreviousStepForm("registration-form-step-1");
        ShowNextStepForm("registration-form-step-2");
        WriteProgressBar(false, "progress-bar", "50", "Step 2 out of 4");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 2: Contact Information"
        );
        WriteButtonText(false, "btn-info", "Go to step 3");
        EnableButton();
        break;
      case "GoToRegistrationStep3":
        HidePreviousStepForm("registration-form-step-2");
        ShowNextStepForm("registration-form-step-3");
        WriteProgressBar(false, "progress-bar", "75", "Step 3 out of 4");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 3: Skills And Competencies"
        );
        WriteButtonText(false, "btn-info", "Go to step 4");
        EnableButton();
        break;
      case "GoToRegistrationStep4":
        HidePreviousStepForm("registration-form-step-3");
        ShowNextStepForm("registration-form-step-4");
        WriteProgressBar(false, "progress-bar", "100", "Step 4 out of 4");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 4: Account Information"
        );
        WriteButtonText(false, "btn-info", "Complete Setup");
        EnableButton();
        break;
      case "GoToRegistrationStep5":
        HidePreviousStepForm("registration-form-step-4");
        ShowNextStepForm("registration-form-step-5");
        WriteProgressBar(false, "progress-bar", "100", "Step 4 out of 4");
        WriteFormStepHeading(
          false,
          "teambp__form-stepHeading",
          "Step 4: Security Information"
        );
        WriteButtonText(false, "btn-info", "Complete Registration");
        EnableButton();
        break;
      case "GoToFinalStep":
        HidePreviousStepForm("login-form-step-2");
        HidePreviousStepForm("registration-form-step-5");
        ShowNextStepForm("complete-setup");
        HideMultipleItemsByClassName([
          "teambp__form-stepHeading",
          "teambp__form-helpText",
          "progress",
          "teambp__formHelpAction",
          "teambp__formFooter",
        ]);
        break;
    }
  }

  function WriteButtonText(defaultText = true, className, message) {
    if (message === undefined) {
      var defaultButtonText = "Go to next step";
    } else {
      var defaultButtonText = message;
    }
    switch (defaultText) {
      case true:
        $("." + className).html(defaultButtonText);
        break;
      case false:
        $("." + className).html(message);
        break;
    }
  }

  function ToggleButtonSpinner(flag, className) {
    switch (flag) {
      case "show":
        if ($("." + className).hasClass("d-none")) {
          $("." + className).removeClass("d-none");
        }
        break;
      case "hide":
        $("." + className).addClass("d-none");
        break;
    }
  }

  function HideItemByClassName(classname) {
    $("." + classname).addClass("d-none");
  }

  function HideMultipleItemsByClassName(classname = []) {
    classname.forEach(HideItemByClassName);
  }

  function DisableButton() {
    $("button[type='submit']").attr("disabled", "disabled");
  }

  function EnableButton() {
    $("button[type='submit']").removeAttr("disabled");
  }

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

  function HidePreviousStepForm(form) {
    $("#" + form).addClass("d-none");
  }

  function ShowNextStepForm(form) {
    $("#" + form)
      .removeClass("d-none")
      .hide();
    setTimeout(function () {
      $("#" + form).fadeIn("slow");
    }, 100);
  }

  function GetErrorMessage(message, className) {
    ToggleAlertVisibility("show", className);
    ToggleAlertColor("danger", className);
    WriteAlertMessage(message, "alert-text");
    WriteAlertHeading(true, "alert-heading");
    WriteAlertFootNote(true, "alert-footnote");
    WriteAlertIcon("show", "error");
    WriteAlertIcon("hide", "success");
    FadeItem("." + className, 9000);
  }

  function GetSuccessMessage(message, className) {
    ToggleAlertVisibility("show", className);
    ToggleAlertColor("success", className);
    WriteAlertMessage(message, "alert-text");
    WriteAlertIcon("show", "success");
    WriteAlertIcon("hide", "error");
    WriteAlertHeading(false, "alert-heading", "Congratulations!");
    WriteAlertFootNote(
      false,
      "alert-footnote",
      "You will be redirected to the next step shortly"
    );
    DisableButton();
    FadeItem("." + className, 4000);
  }

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

  function WriteAlertMessage(message, alertClassName) {
    $("." + alertClassName).html(message);
  }

  function WriteAlertFootNote(defaultText = true, className, message) {
    let defaultAlertFootNoteText = "Please correct the field then try again";
    switch (defaultText) {
      case true:
        $("." + className).html(defaultAlertFootNoteText);
        break;
      case false:
        $("." + className).html(message);
        break;
    }
  }

  function WriteAlertHeading(defaultText = true, alertClassName, message) {
    let defaultAlertText = "Oops! We run into an error";
    switch (defaultText) {
      case true:
        $("." + alertClassName).html(defaultAlertText);
        break;
      case false:
        $("." + alertClassName).html(message);
        break;
    }
  }

  function WriteAlertIcon(action, className) {
    switch (action) {
      case "show":
        $("." + className).removeClass("d-none");
        break;
      case "hide":
        $("." + className).addClass("d-none");
        break;
    }
  }

  function ToggleSpinnerVisibility(action) {
    switch (action) {
      case "show":
        $(".spinner").removeClass("d-none");
        break;
      case "hide":
        $(".spinner").addClass("d-none");
        break;
    }
  }

  function ToggleAlertColor(flag, alertClassName) {
    switch (flag) {
      case "success":
        if ($("." + alertClassName).hasClass("alert-danger")) {
          $("." + alertClassName)
            .removeClass("alert-danger")
            .addClass("alert-success");
        }
        break;
      case "danger":
        if ($("." + alertClassName).hasClass("alert-success")) {
          $("." + alertClassName)
            .removeClass("alert-success")
            .addClass("alert-danger");
        }
        break;
    }
  }

  function ToggleAlertVisibility(action, alertClassName) {
    switch (action) {
      case "show":
        if ($("." + alertClassName).hasClass("d-none")) {
          $("." + alertClassName).removeClass("d-none");
        }
        break;
      case "hide":
        $("." + alertClassName).addClass("d-none");
        break;
    }
  }

  function ModifyHelpText(defaultText = true, helpTextClassName = "", message) {
    let defaultHelpText = "Required fields are marked by *";
    switch (defaultText) {
      case true:
        $("." + helpTextClassName).html(defaultHelpText);
        break;
      case false:
        $("." + helpTextClassName).html(message);
        break;
    }
  }

  function FadeItem(item, timer) {
    setTimeout(function () {
      $(item).addClass("d-none");
    }, timer);
  }

  TogglePasswordVisibility("password-switch", "password-visibility-toggle");

  function TogglePasswordVisibility(parent, child) {
    $("." + parent).click(function () {
      if ($(this).prop("checked") === true) {
        $("." + child).attr("type", "text");
      } else {
        if ($(this).prop("checked") === false) {
          $("." + child).attr("type", "password");
        }
      }
    });
  }
});
