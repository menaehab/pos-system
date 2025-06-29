<div class="h-[calc(100vh-7rem)] flex items-center justify-center p-4">
    <div class="w-full max-w-md" x-data="{
        answer: '',
        lastInputWasOperator: false,

        appendToAnswer(value) {
            if (['+', '-', '*', '/'].includes(value) && this.lastInputWasOperator) return;
            if (value === '.' && this.answer.toString().split(/[+\-*/]/).pop().includes('.')) return;
            this.answer += value;
            this.lastInputWasOperator = ['+', '-', '*', '/'].includes(value);
        },

        calculate() {
            try {
                if (!this.answer) return;
                let expression = this.answer;
                if (['+', '-', '*', '/'].includes(expression.slice(-1))) {
                    expression = expression.slice(0, -1);
                }
                const result = eval(expression);
                this.answer = isFinite(result) && !isNaN(result) ? result.toString() : 'Error';
                this.lastInputWasOperator = false;
            } catch (e) {
                this.answer = 'Error';
                this.lastInputWasOperator = false;
            }
        },

        clear() {
            this.answer = '';
            this.lastInputWasOperator = false;
        },

        handleKeydown(event) {
            if ([46, 8, 9, 27, 13, 110, 190].includes(event.keyCode) ||
                (event.ctrlKey === true && [65, 67, 86, 88].includes(event.keyCode)) ||
                (event.keyCode >= 35 && event.keyCode <= 39)) {
                return;
            }
            if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) &&
                (event.keyCode < 96 || event.keyCode > 105) &&
                !['+', '-', '*', '/', '=', '.', 'Enter'].includes(event.key)) {
                event.preventDefault();
            }
        }
    }">
        <input class="w-full py-6 px-4 border bg-white border-gray-300 rounded text-3xl" autofocus type="text"
            x-model="answer" x-on:keydown="handleKeydown" pattern="[0-9+\-*/.()]+">

        <div class="grid grid-cols-4 gap-2 mt-6">
            <button x-on:click="appendToAnswer('+')"
                class="w-full py-6 px-4 border bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors duration-200 text-3xl"
                type="button">+</button>
            <button x-on:click="appendToAnswer('-')"
                class="w-full py-6 px-4 border bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors duration-200 text-3xl"
                type="button">-</button>
            <button x-on:click="appendToAnswer('*')"
                class="w-full py-6 px-4 border bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors duration-200 text-3xl"
                type="button">*</button>
            <button x-on:click="appendToAnswer('/')"
                class="w-full py-6 px-4 border bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors duration-200 text-3xl"
                type="button">/</button>
            <div class="col-span-3">
                <div class="grid grid-cols-3 gap-2">
                    <button x-on:click="appendToAnswer('1')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">1</button>
                    <button x-on:click="appendToAnswer('2')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">2</button>
                    <button x-on:click="appendToAnswer('3')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">3</button>
                    <button x-on:click="appendToAnswer('4')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">4</button>
                    <button x-on:click="appendToAnswer('5')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">5</button>
                    <button x-on:click="appendToAnswer('6')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">6</button>
                    <button x-on:click="appendToAnswer('7')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">7</button>
                    <button x-on:click="appendToAnswer('8')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">8</button>
                    <button x-on:click="appendToAnswer('9')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">9</button>
                    <button x-on:click="appendToAnswer('0')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">0</button>
                    <button x-on:click="appendToAnswer('.')"
                        class="w-full py-6 px-4 border bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 text-3xl"
                        type="button">.</button>
                    <button x-on:click="clear()"
                        class="w-full py-6 px-4 border bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-200 text-3xl"
                        type="button">C</button>
                </div>
            </div>
            <button x-on:click="calculate()"
                class="w-full py-6 px-4 border bg-green-500 text-white rounded hover:bg-green-600 transition-colors duration-200 text-3xl"
                type="button">=</button>
        </div>
    </div>
</div>
