class ArrayUtilities
{
    static create = function (...items: any) {
        return new Array (...items);
    };
    static createRange = function (min: number, max: number, step: number) {
        let output: number[] = [];
        for (let i = min; i <= max; i += step) {
            output.push(i);
        }
    }
}