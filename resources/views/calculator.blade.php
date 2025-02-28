@extends('home')

@section('content')

<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Calculator</h1>
        <form id="calculator-form">
            <div class="mb-4 border rounded">
                <input type="text" id="displayOperation" name="expression" class="w-full text-right" readonly>
                <input type="text" id="displayResult" name="result" class="w-full p-2 text-right" readonly>
            </div>
            <div class="grid grid-cols-4 gap-2">
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('7')">7</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('8')">8</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('9')">9</button>
                <button type="button" class="bg-yellow-400 p-4 rounded" onclick="setOperation('/')">/</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('4')">4</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('5')">5</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('6')">6</button>
                <button type="button" class="bg-yellow-400 p-4 rounded" onclick="setOperation('*')">*</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('1')">1</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('2')">2</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('3')">3</button>
                <button type="button" class="bg-yellow-400 p-4 rounded" onclick="setOperation('-')">-</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('0')">0</button>
                <button type="button" class="bg-gray-200 p-4 rounded" onclick="appendNumber('.')">.</button>
                <button type="button" class="bg-red-400 p-4 rounded" onclick="clearDisplay()">C</button>
                <button type="button" class="bg-yellow-400 p-4 rounded" onclick="setOperation('+')">+</button>
                <button type="button" class="col-span-4 bg-green-400 p-4 rounded" onclick="calculateResult()">=</button>
            </div>
        </form>
    </div>

    <script>
        let display = document.getElementById('displayResult');
        let operationDisplay = document.getElementById('displayOperation');
        let currentOperation = null;
        let firstOperand = null;
        let calculateRoute = "{{ route('calculate') }}";

        function appendNumber(number) {
            display.value += number;
        }

        function setOperation(operation) {
            firstOperand = parseFloat(display.value);
            currentOperation = operation;
            operationDisplay.value += firstOperand + ' ' + operation + ' ';
            display.value = '';
        }

        function calculateResult() {
            if (!isNaN(operationDisplay)) {
                fetch(calculateRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        expression: operationDisplay.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        display.value = data.result;
                        operationDisplay.value += secondOperand + ' = ';
                    }
                })
                .catch(error => console.error('Error:', error));
            }
            currentOperation = null;
            firstOperand = null;
        }

        function clearDisplay() {
            display.value = '';
            operationDisplay.value = '';
            currentOperation = null;
            firstOperand = null;
        }
    </script>
</div>

@endsection
