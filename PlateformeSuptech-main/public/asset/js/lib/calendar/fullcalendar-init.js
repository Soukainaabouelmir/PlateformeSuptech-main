!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body");
        this.$modal = $('#event-modal');
        this.$event = $('#external-events div.external-event');
        this.$calendar = $('#calendar');
        this.$saveCategoryBtn = $('.save-category');
        this.$categoryForm = $('#add-category form');
        this.$extEvents = $('#external-events');
        this.$calendarObj = null;
    };

    // on drop
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        var copiedEventObject = $.extend({}, originalEventObject);
        copiedEventObject.start = date;
        if ($categoryClass) {
            copiedEventObject['className'] = [$categoryClass];
        }
        $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
        if ($('#drop-remove').is(':checked')) {
            eventObj.remove();
        }
    };

    // on click on event
    CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
        var $this = this;
        var form = $("<form></form>");
        form.append("<div class='row'></div>");
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Semaine</label><input class='form-control' type='text' value='" + (calEvent.semaine || '') + "' name='semaine'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Module</label><input class='form-control' type='text' value='" + (calEvent.title || '') + "' name='module'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Enseignant</label><input class='form-control' type='text' value='" + (calEvent.enseignant || '') + "' name='enseignant'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Groupe</label><input class='form-control' type='text' value='" + (calEvent.groupe || '') + "' name='groupe'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Salle</label><input class='form-control' type='text' value='" + (calEvent.salle || '') + "' name='salle'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Date</label><input type='date' class='form-control' name='date'></div></div>");
        
        form.find("select[name='category']")
            .append("<option value='bg-danger'>Danger</option>")
            .append("<option value='bg-success'>Success</option>")
            .append("<option value='bg-dark'>Dark</option>")
            .append("<option value='bg-primary'>Primary</option>")
            .append("<option value='bg-pink'>Pink</option>")
            .append("<option value='bg-info'>Info</option>")
            .append("<option value='bg-warning'>Warning</option>");
        
        $this.$modal.modal({ backdrop: 'static' });
        $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').on("click", function () {
            $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                return (ev._id == calEvent._id);
            });
            $this.$modal.modal('hide');
        });
        
        $this.$modal.find('form').on('submit', function () {
            calEvent.semaine = form.find("input[name='semaine']").val();
            calEvent.title = form.find("input[name='module']").val();
            calEvent.enseignant = form.find("input[name='enseignant']").val();
            calEvent.groupe = form.find("input[name='groupe']").val();
            calEvent.salle = form.find("input[name='salle']").val();
            calEvent.className = form.find("select[name='category']").val();
            $this.$calendarObj.fullCalendar('updateEvent', calEvent);
            $this.$modal.modal('hide');
            return false;
        });
    };

    // on select
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        var $this = this;
        $this.$modal.modal({ backdrop: 'static' });
        var form = $("<form></form>");
        form.append("<div class='row'></div>");
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Semaine</label><select class='form-control' name='semaine'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Module</label><select class='form-control' name='id_element'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Enseignant</label><select class='form-control' name='id_personnel'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Groupe</label><select class='form-control' name='groupe'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Salle</label><select class='form-control' name='id_salle'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Heure Début</label><select class='form-control' name='id_heure_debut'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Heure Fin</label><select class='form-control' name='id_heure_fin'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Date</label><input type='date' class='form-control' name='date'></div></div>");
        
        // Populate dropdowns with data
        populateDropdowns(form);
    
        $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').on("click", function () {
            form.submit();
        });
    
        $this.$modal.find('form').on('submit', function () {
            var semaine = form.find("select[name='semaine']").val();
            var module = form.find("select[name='id_element']").val();
            var enseignant = form.find("select[name='id_personnel']").val();
            var groupe = form.find("select[name='groupe']").val();
            var salle = form.find("select[name='id_salle']").val();
            var heureDebut = form.find("select[name='id_heure_debut']").val();
            var heureFin = form.find("select[name='id_heure_fin']").val();
            var categoryClass = form.find("select[name='category']").val();
    
            if (module !== null && module.length != 0) {
                $this.$calendarObj.fullCalendar('renderEvent', {
                    title: form.find("select[name='id_element'] option:selected").text(),
                    start: start,
                    end: end,
                    allDay: false,
                    className: categoryClass,
                    semaine: semaine,
                    enseignant: enseignant,
                    groupe: groupe,
                    salle: salle,
                    heure_debut: heureDebut,
                    heure_fin: heureFin
                }, true);  
                $this.$modal.modal('hide');
            } else {
                alert('You have to give a title to your event.');
            }
    
            return false;
        });
    
        $this.$calendarObj.fullCalendar('unselect');
    };

    // populate dropdowns
    function populateDropdowns(form) {
        $.ajax({
            url: '/calendar', // Adjust this URL to your endpoint
            type: 'GET',
            success: function(response) {
                var elements = response.data;
                var elementSelect = form.find("select[name='id_element']");
                elementSelect.empty();
                $.each(elements, function(index, element) {
                    elementSelect.append("<option value='" + element.id + "'>" + element.name + "</option>");
                });
            }
        });

        $.ajax({
            url: '/calendar', // Adjust this URL to your endpoint
            type: 'GET',
            success: function(response) {
                var personnel = response.data;
                var personnelSelect = form.find("select[name='id_personnel']");
                personnelSelect.empty();
                $.each(personnel, function(index, person) {
                    personnelSelect.append("<option value='" + person.id + "'>" + person.name + "</option>");
                });
            }
        });

       

        $.ajax({
            url: '/calendar', // Adjust this URL to your endpoint
            type: 'GET',
            success: function(response) {
                var salles = response.data;
                var salleSelect = form.find("select[name='id_salle']");
                salleSelect.empty();
                $.each(salles, function(index, salle) {
                    salleSelect.append("<option value='" + salle.id + "'>" + salle.name + "</option>");
                });
            }
        });

        $.ajax({
            url: '/calendar', // Adjust this URL to your endpoint
            type: 'GET',
            success: function(response) {
                var heuresDebut = response.data;
                var heureDebutSelect = form.find("select[name='id_heure_debut']");
                heureDebutSelect.empty();
                $.each(heuresDebut, function(index, heure) {
                    heureDebutSelect.append("<option value='" + heure.id + "'>" + heure.name + "</option>");
                });
            }
        });

        $.ajax({
            url: '/calendar', // Adjust this URL to your endpoint
            type: 'GET',
            success: function(response) {
                var heuresFin = response.data;
                var heureFinSelect = form.find("select[name='id_heure_fin']");
                heureFinSelect.empty();
                $.each(heuresFin, function(index, heure) {
                    heureFinSelect.append("<option value='" + heure.id + "'>" + heure.name + "</option>");
                });
            }
        });

       
    }

    // Initializing
    CalendarApp.prototype.init = function () {
        var $this = this;

        $this.$calendarObj = $this.$calendar.fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true,
            events: [
                {
                    id: 1,
                    title: 'Event 1',
                    start: new Date(),
                    className: 'bg-info'
                }
            ],
            editable: true,
            droppable: true,
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $this.onSelect(start, end, allDay);
            },
            eventDrop: function (event, delta, revertFunc) {
                console.log(event);
            },
            eventClick: function (calEvent, jsEvent, view) {
                $this.onEventClick(calEvent, jsEvent, view);
            }
        });

        // External events
        $this.$event.each(function () {
            var $this = $(this);
            var eventObject = {
                title: $.trim($this.text()), 
                category: $this.data('class')
            };
            $this.data('eventObject', eventObject);
            $this.draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
    };

    $(document).ready(function() {
        var calendarApp = new CalendarApp();
        calendarApp.init();
    });

}(window.jQuery);
