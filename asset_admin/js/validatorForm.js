  $(document).ready(function() {
    $('#form1').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            tanggal: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Pilih Tanggal!'
                    }
                }
            },
            tanggalTraining: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Pilih Tanggal!'
                    }
                }
            },
            tanggalmulai: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Pilih Tanggal!'
                    }
                }
            },
            tanggalselesai: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Pilih Tanggal!'
                    }
                }
            },
            durasi: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,2}?[a-zA-Z .]*$/,
                        message: "Inputan Error. Silahkan Masukkan Durasi dengan Benar!"
                    }
                }
            },
            durasiTraining: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,2}?[a-zA-Z .]*$/,
                        message: "Inputan Error. Silahkan Masukkan Durasi dengan Benar!"
                    }
                }
            },
            saldomin: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            editsaldomin: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            saldomaks: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            editsaldomaks: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            biaya: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            persentase: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            persenbunga: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            editPersenbunga: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            denda: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            editDenda: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            tenor: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            editTenor: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[1-9]{1}?[0-9]{0,20}$/,
                        message: "Inputan Error Selain Angka dan Inputan Awal Bukan 0."
                    }
                }
            },
            bunga: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            bunga2: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            editbunga: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,20}[.]?[0-9]{0,2}$/,
                        message: "Inputan Error Selain Angka dan Tanda Titik(.). Hanya dapat menerima 2 angka di belakang koma"
                    }
                }
            },
            kuota: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    }
                }
            },
            kuota: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Angka!'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Alamat Email !'
                    },
                    emailAddress: {
                        message: 'Silahkan Masukkan Alamat Email Yang Valid !'
                    }
                }
            },
            telepon: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan Masukkan Nomor Telepon !'
                    },
                    regexp: {
                        regexp: /^[0-9]{0,12}$/,
                        message: "Silahkan Masukkan Angka ! (Maksimal 12 Angka)"
                    }
                }
            }
            
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#form1').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});