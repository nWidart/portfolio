@extends('layouts.master')

@section('title')
Book library | @parent
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Books I've read</h2>
        <ul class="book-list">
            <li class="group">
                <img src="{{ asset('assets/img/cleanCode.jpeg') }}" alt="Clean Code" class="pull-left book-cover"/>
                <h3><a href="http://www.amazon.com/Clean-Code-Handbook-Software-Craftsmanship/dp/0132350882/ref=sr_1_1?ie=UTF8&qid=1410892741&sr=8-1&keywords=clean+code" target="_blank">Clean Code</a></h3>
                <span class="author">By Robert C. Martin, Aka, UncleBob</span>
            </li>
            <li class="group">
                <img src="{{ asset('assets/img/SmashingBook3.jpg') }}" alt="Smashing Book 3" class="pull-left book-cover"/>
                <h3><a href="http://www.amazon.com/Redesign-Extension-Smashing-Book-Books-ebook/dp/B0085MEMA4/ref=sr_1_2?s=books&ie=UTF8&qid=1410893882&sr=1-2&keywords=smashing+book+3">The Smashing Book 3</a></h3>
                <span class="author">By Smashing Magazine</span>
            </li>
            <li class="group">
                <img src="{{ asset('assets/img/SteveJobs.jpeg') }}" alt="Steve Jobs" class="pull-left book-cover"/>
                <h3><a href="http://www.amazon.com/Steve-Jobs-Walter-Isaacson/dp/1451648537/ref=sr_1_1?s=books&ie=UTF8&qid=1410894202&sr=1-1&keywords=steve+jobs">Steve Jobs</a></h3>
                <span class="author">By Walter Isaacson</span>
            </li>
            <li class="group">
                <img src="{{ asset('assets/img/SmashingBook2.jpg') }}" alt="Smashing book 2" class="pull-left book-cover"/>
                <h3><a href="http://www.amazon.com/Smashing-Book-Digital-Books-ebook/dp/B006PHOLRU/ref=sr_1_18?s=books&ie=UTF8&qid=1410893538&sr=1-18&keywords=smashing+magazine">The Smashing Book 2</a></h3>
                <span class="author">By Smashing Magazine</span>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <h2>Currently reading...</h2>
        <ul class="book-list">
            <li class="group">
                <img src="{{ asset('assets/img/DomainDrivenDesign.jpeg') }}" alt="Domain Driven Design" class="pull-left book-cover"/>
                <h3><a href="http://www.amazon.com/Domain-Driven-Design-Tackling-Complexity-Software/dp/0321125215/ref=sr_1_1?ie=UTF8&qid=1410893440&sr=8-1&keywords=domain+driven+design" target="_blank">Domain Driven Design</a></h3>
                <span class="author">By Eric Evans</span>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md12">
        <h2>Books I'm going to read</h2>
        <ul class="book-list">
            <li class="pull-left">
                <a href="http://www.amazon.com/Implementing-Domain-Driven-Design-Vaughn-Vernon/dp/0321834577/ref=sr_1_1?s=books&ie=UTF8&qid=1410894043&sr=1-1&keywords=implementing+domain-driven+design" target="_blank">
                    <img src="{{ asset('assets/img/ImplementingDomainDrivenDesign.jpeg') }}" alt="Implementing DDD" class="book-cover"/>
                </a>
            </li>
            <li class="pull-left">
                <a href="http://www.amazon.com/Refactoring-Improving-Design-Existing-Code/dp/0201485672/ref=sr_1_1?s=books&ie=UTF8&qid=1410894287&sr=1-1&keywords=refactoring" target="_blank">
                    <img src="{{ asset('assets/img/Refactoring.jpeg') }}" alt="Refactoring" class="book-cover"/>
                </a>
            </li>
            <li class="pull-left">
                <a href="http://www.amazon.com/Software-Development-Principles-Patterns-Practices/dp/0135974445/ref=la_B000APG87E_1_2?s=books&ie=UTF8&qid=1410894443&sr=1-2" target="_blank">
                    <img src="{{ asset('assets/img/AgileSoftwareDev.jpeg') }}" alt="Agile Software development" class="book-cover"/>
                </a>
            </li>
            <li class="pull-left">
                <a href="http://www.amazon.com/Clean-Coder-Conduct-Professional-Programmers/dp/0137081073/ref=la_B000APG87E_1_3?s=books&ie=UTF8&qid=1410894443&sr=1-3" target="_blank">
                    <img src="{{ asset('assets/img/CleanCoder.jpeg') }}" alt="The Clean Coder" class="book-cover"/>
                </a>
            </li>
        </ul>
    </div>
</div>
@stop
