<script setup>
import Layout from '@/Shared/Layout.vue';
import { router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps({
    questions:Object,
})

const currentIndex = ref(0)
const totalQuestions=computed(()=>props.questions.length)
const currentQuestion = computed(()=>{
    return props.questions[currentIndex.value]
})

const isLastQuestion=computed(()=>currentIndex.value === props.questions.length-1)

const answers=computed(()=>{
    return props.questions[currentIndex.value].answers
})


const selectedAnswer= ref(null)
const result=ref(0)
function selectedOption(index){
    selectedAnswer.value=index
}

function nextQuestion(){
    if(selectedAnswer.value != null){
        if(props.questions[currentIndex.value].answers[selectedAnswer.value].correct_answer==1){
            result.value++;
        }
        currentIndex.value++;
        selectedAnswer.value=null
    }
}

function calculateResult(){
    if(props.questions[currentIndex.value].answers[selectedAnswer.value].correct_answer==1){
            result.value++;
        }

        router.post('/results',[
            {
                results:{
                    'score':result.value,
                    'totalQuestions': totalQuestions.value
                }
            }
        ])
}
</script>
<template>
    <Layout>
        <div class="quiz_app">
            <div class="d-flex justify-content-center text-danger fw-bolder fs-3 mt-3">Question {{ currentIndex+1}} out of {{totalQuestions}}</div>
                <div class="list-group col-md-11 mx-auto mt-5">
                    <label class="list-group-item d-flex gap-3">
                        <h5>
                            <span class="pt-1 form-checked-content">
                            <strong>{{ currentQuestion.question }}</strong>
                            </span>
                        </h5>
                    </label>
                    <div v-for="(answer,index) in answers" :key="index" >
                        <label  @click="selectedOption(index)" class="list-group-item d-flex gap-3" :class="{'selected' : selectedAnswer==index}">
                            <input class="form-check-input flex-shrink-0" type="radio" :checked="selectedAnswer==index"  :value="answer.id" style="font-size: 1.375em;">
                            <span class="pt-1 form-checked-content">{{ answer.answer }}</span>
                        </label>
                    </div>
                <div class="d-flex justify-content-end mt-5">
                    <button @click="nextQuestion" v-if="!isLastQuestion" class="btn btn-primary me-3">Next</button>
                    <button @click="calculateResult" v-if="isLastQuestion" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>

    </Layout>
</template>

<style scoped>
.quiz_app{
    width: 500px;
    min-height: 600px;
    padding: 15px;
    border: 3px solid #ff00ff;
    border-radius: 20px;
    margin: auto;
    background: #00ffff;
}
.selected{
    background-color: blue;
color: white;
}
</style>
