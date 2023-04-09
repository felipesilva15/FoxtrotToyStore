let cpfFormatted = new Cleave('.cpfMask', {
    delimiters: ['.', '.', '-'],
    blocks: [3,3,3,2],
    numericOnly: true
});