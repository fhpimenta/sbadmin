$(function() {
    $("#cpf").mask('000.000.000-00', {reverse: true});
    $("#data_nascimento").mask('00/00/0000');
    $("#cep").mask("00000-000");
    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $("input[type=tel]").mask(SPMaskBehavior, spOptions);
});