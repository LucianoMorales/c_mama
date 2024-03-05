var canvas = new fabric.Canvas('myCanvas');
    var drawing = false;
    var undoStack = [];

    canvas.on('mouse:down', function(options) {
      drawing = true;
      var pointer = canvas.getPointer(options.e);
      var points = [pointer.x, pointer.y];
      undoStack.push(canvas.toJSON());
      canvas.add(new fabric.PencilBrush(canvas));
      canvas.freeDrawingBrush.color = 'black';
      canvas.freeDrawingBrush.width = 5;
      canvas.freeDrawingBrush.onMouseDown(pointer);
    });

    canvas.on('mouse:move', function(options) {
      if (!drawing) return;
      var pointer = canvas.getPointer(options.e);
      canvas.freeDrawingBrush.onMouseMove(pointer);
    });

    canvas.on('mouse:up', function() {
      drawing = false;
    });

    function undo() {
      if (undoStack.length > 1) {
        undoStack.pop();
        canvas.loadFromJSON(undoStack[undoStack.length - 1], canvas.renderAll.bind(canvas));
      }
    }

    function clearCanvas() {
      undoStack.push(canvas.toJSON());
      canvas.clear();
    }
