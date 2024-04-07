export default {


    validateLength(data, minLen, maxLen) {
        if (data.length < minLen || data.length > maxLen) return false
        else return true
    },
    validateFirstSymbol(str, sybol) {
        if (str[0] != sybol) return false
        else return true
    },
    validateEmail(str) {
        let lengthSpecialChar = str.match(/@/g);
        if (lengthSpecialChar == null) {
            return false
        }
        if (lengthSpecialChar.length == 0) {
            return false
        }
        else return true
    }

}