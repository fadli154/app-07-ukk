$(".summernote").summernote({
    inheritPlaceholder: true,
    dialogsInBody: true,
    minHeight: 120,
    toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["insert", ["link"]],
    ],
});

$(".summernote-disabled").summernote({
    tabDisable: true,
    disabled: true,
    inheritPlaceholder: true,
    dialogsInBody: true,
    minHeight: 120,
    toolbar: [],
});

$(".summernote-disabled").summernote("disable");

$("#hint").summernote({
    height: 100,
    toolbar: false,
    placeholder: "type with apple, orange, watermelon and lemon",
    hint: {
        words: ["apple", "orange", "watermelon", "lemon"],
        match: /\b(\w{1,})$/,
        search: function (keyword, callback) {
            callback(
                $.grep(this.words, function (item) {
                    return item.indexOf(keyword) === 0;
                })
            );
        },
    },
});
