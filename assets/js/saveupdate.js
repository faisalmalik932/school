/*
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 12-Aug-17 / 3:24 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */
$(function() {
    $('.SAVE').on('click', function () {
        $.confirm({
            icon: 'icon-alert',
            title: 'Save Confirmation!',
            content: 'Would like to save/update your record!',
            animation: 'left',
            closeAnimation: 'scale',
            closeIcon: true,
            closeIconClass: 'icon-cross2',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                confirm: {
                    btnClass: 'btn-blue',
                    action: function () {
                        console.log(dataTableArray);
                        $('#DATAFORM').submit();
                    }
                },
                cancel: function () { }
            }
            });
        });
    });