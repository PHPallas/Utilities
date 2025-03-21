"use strict";
class ArrayUtilities {
}
ArrayUtilities.create = function (...items) {
    return new Array(...items);
};
ArrayUtilities.createRange = function (min, max, step) {
    let output = [];
    for (let i = min; i <= max; i += step) {
        output.push(i);
    }
};
