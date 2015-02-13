var Script = function () {

    //chosen select
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({allow_single_deselect: true});


    //tag input

    function onAddTag(tag) {
        alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
    }

    //toggle button

    window.prettyPrint && prettyPrint();

    $('.toggle-button-class').toggleButtons({
        style: {
            // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
            enabled: "success",
            disabled: "danger"
        }
    });

    $('#normal-toggle-button').toggleButtons();

    $('#text-toggle-button').toggleButtons({
        width: 220,
        label: {
            enabled: "Lorem Ipsum",
            disabled: "Dolor Sit"
        }
    });

    $('#not-animated-toggle-button').toggleButtons({
        animated: false
    });

    $('#transition-percent-toggle-button').toggleButtons({
        transitionspeed: "500%"
    });

    $('#transition-value-toggle-button').toggleButtons({
        transitionspeed: 1 // default value: 0.05
    });

    $('#danger-toggle-button').toggleButtons({
        style: {
            // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
            enabled: "danger",
            disabled: "info"
        }
    });
    $('#info-toggle-button').toggleButtons({
        style: {
            // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
            enabled: "info",
            disabled: "info"
        }
    });
    $('#success-toggle-button').toggleButtons({
        style: {
            // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
            enabled: "success",
            disabled: "info"
        }
    });
    $('#warning-toggle-button').toggleButtons({
        style: {
            // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
            enabled: "warning",
            disabled: "info"
        }
    });

    $('#height-text-style-toggle-button').toggleButtons({
        height: 100,
        font: {
            'line-height': '100px',
            'font-size': '18px',
            'font-style': 'regular'
        }
    });

}();