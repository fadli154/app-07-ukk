FilePond.registerPlugin(FilePondPluginImagePreview);

const images = document.querySelectorAll(".image-preview-filepond");

// Filepond: Image Preview
images.forEach((image) =>
    FilePond.create(image, {
        allowImagePreview: true,
        allowFileEncode: false,
        allowImageCrop: true,
        imageResizeTargetWidth: 1200,
        imageResizeTargetHeight: 1200,
        maxFileSize: "5MB",
        acceptedFileTypes: [
            "image/png",
            "image/jpg",
            "image/jpeg",
            "image/svg",
        ],
        fileValidateTypeDetectType: (source, type) => {
            new Promise((resolve, reject) => {
                resolve(type);
            });
        },
        storeAsFile: true,
        imageCropAspectRatio: "1:1",
    })
);
