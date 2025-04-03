@extends('base')
@section('title', 'Page d accueil')
@section('content')
    <h1 class="my-2 p-2 text-xl gap-6 text-center rounded-md hover:text-green-600 uppercase bg-[#FF2D20]/10">
        Bienvenu sur l'app de gestion administrative de la Direction de l'Hydraulique Rural
    </h1>


    <div @class(['grid grid-cols-1 gap-4 xl:grid-cols-3 md:grid-cols-2 sm:[grid-cols-1 border-md border-dashed]  text-center text-2xl'])>
        <div @class(['w-1/2'])>
            <p class="">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.

            </p>

            <button type="button" class='p-4 text-white rounded-md bg-red-500 xl:lg:md:sm:hover:bg-blue-500 text-red'>Click me !</button>
        </div>
        <div @class(['w-1/2'])>
            <p class="font-bold text-red-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.

            </p>

            <button @class([''])>Click me !</button>
        </div>
        <div @class(['w-1/2'])>
            <p class="font-bold text-red-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.

            </p>

            <button @class([''])>Click me !</button>
        </div>
        <div @class(['w-1/2'])>
            <p class="font-bold text-red-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.

            </p>

            <button @class([''])>Click me !</button>
        </div>
        <div @class(['w-1/2'])>
            <p class="font-bold text-red-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.

            </p>

            <button @class([''])>Click me !</button>
        </div>
    </div>
@endsection
